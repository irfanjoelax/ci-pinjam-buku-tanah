<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    private $pathView = 'role/petugas/transaksi/';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'petugas') {
            redirect(site_url('/'));
        }
    }

    public function pinjam()
    {
        $desa = $this->db->order_by('kode_desa', 'ASC')->get('desa')->result();
        $jenisHak = $this->db->order_by('id_jenis', 'DESC')->get('jenis_hak')->result();
        $keperluan = $this->db->order_by('id_keperluan', 'DESC')->get('keperluan')->result();
        $user = $this->db->order_by('nip', 'DESC')->get('user')->result();

        $this->load->view($this->pathView . 'pinjam_view', [
            'menuActive' => 'pinjam',
            'isEdit'     => FALSE,
            'url'        => site_url('petugas/transaksi/pinjam_store'),
            'desa'       => $desa,
            'jenisHak'   => $jenisHak,
            'keperluan'  => $keperluan,
            'user'       => $user,
        ]);
    }

    public function pinjam_ubah($id_transaksi)
    {
        $desa = $this->db->order_by('kode_desa', 'ASC')->get('desa')->result();
        $jenisHak = $this->db->order_by('id_jenis', 'DESC')->get('jenis_hak')->result();
        $user = $this->db->order_by('nip', 'DESC')->get('user')->result();
        $transaksi = $this->db->get_where('transaksi', ['id_transaksi' => $id_transaksi])->row();

        $this->load->view($this->pathView . 'pinjam_view', [
            'menuActive' => 'pinjam',
            'isEdit'     => TRUE,
            'url'        => site_url('petugas/transaksi/pinjam_store/' . $id_transaksi),
            'desa'       => $desa,
            'jenisHak'   => $jenisHak,
            'transaksi'  => $transaksi,
        ]);
    }

    public function pinjam_store($id_transaksi = null)
    {
        $data = [
            'desa_kode'     => $this->input->post('desa_kode', TRUE),
            'jenis_id'      => $this->input->post('jenis_id', TRUE),
            'keperluan_id'  => $this->input->post('keperluan_id', TRUE),
            'nomer_hak'     => $this->input->post('nomer_hak', TRUE),
            'nomer_berkas'  => $this->input->post('nomer_berkas', TRUE),
            'tgl_pinjam'    => $this->input->post('tgl_pinjam', TRUE),
            'tgl_kembali'   => null,
            'user_nip'      => $this->session->userdata('nip'),
        ];

        if ($id_transaksi == null) {
            $arrayWhere = [
                'nomer_hak' => $this->input->post('nomer_hak', TRUE),
                'tgl_kembali'  => null,
            ];

            $checkTransaksi = $this->db->get_where('transaksi', $arrayWhere)->num_rows();

            if ($checkTransaksi == 0) {
                $this->db->insert('transaksi', $data);
            } else {
                $this->session->set_flashdata('alert', '<script>alert(`Buku dengan Nomer Hak tersebut sudah di pinjam`)</script>');
                redirect(site_url('petugas/transaksi/pinjam'));
            }
        } else {
            $this->db->where('id_transaksi', $id_transaksi)->update('transaksi', $data);
        }

        redirect(site_url('petugas/dashboard'));
    }

    public function kembali()
    {
        $desa       = $this->db->order_by('kode_desa', 'ASC')->get('desa')->result();
        $jenisHak   = $this->db->order_by('id_jenis', 'DESC')->get('jenis_hak')->result();
        $data       = null;
        $id         = $this->input->get('id');
        $nomer_hak  = $this->input->get('nomer_hak');
        $desa_kode  = $this->input->get('desa_kode');
        $jenis_id   = $this->input->get('jenis_id');
        $tgl_pinjam = $this->input->get('tgl_pinjam');

        if ($nomer_hak != null && $desa_kode != null && $jenis_id != null && $tgl_pinjam != null) {
            $this->db->select('*');
            $this->db->from('transaksi');
            $this->db->join('desa', 'desa.kode_desa = transaksi.desa_kode');
            $this->db->join('jenis_hak', 'jenis_hak.id_jenis = transaksi.jenis_id');
            $this->db->join('keperluan', 'keperluan.id_keperluan = transaksi.keperluan_id');
            $this->db->join('user', 'user.nip = transaksi.user_nip');
            $this->db->join('petugas', 'petugas.id_petugas = user.petugas_id');
            // $this->db->where('transaksi.id_transaksi', $id);
            $this->db->where('transaksi.nomer_hak', $nomer_hak);
            $this->db->where('transaksi.desa_kode', $desa_kode);
            $this->db->where('transaksi.jenis_id', $jenis_id);
            $this->db->where('transaksi.tgl_pinjam', $tgl_pinjam);

            $data = $this->db->get()->row();
        }

        $this->load->view($this->pathView . 'kembali_view', [
            'menuActive' => 'kembali',
            'data'       => $data,
            'desa'       => $desa,
            'jenisHak'   => $jenisHak,
            'nomer_hak'  => $nomer_hak,
            'desa_kode'  => $desa_kode,
            'jenis_id'   => $jenis_id,
            'tgl_pinjam' => $tgl_pinjam,
        ]);
    }

    public function kembali_store($id)
    {
        $data = [
            'tgl_kembali'    => $this->input->post('tgl_kembali', TRUE),
        ];

        $this->db->where('id_transaksi', $id)->update('transaksi', $data);

        redirect(site_url('petugas/dashboard'));
    }
}
