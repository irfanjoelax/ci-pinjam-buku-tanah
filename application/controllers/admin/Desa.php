<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Desa extends CI_Controller
{
    private $menuActive = 'kode_desa';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $desa = $this->db->order_by('nama_desa', 'ASC')->get('desa')->result();

        $this->load->view('role/admin/kode_desa/index_view', [
            'menuActive' => $this->menuActive,
            'desa' => $desa,
        ]);
    }

    public function create()
    {
        $this->load->view('role/admin/kode_desa/form_view', [
            'menuActive' => $this->menuActive,
            'isEdit' => false,
            'urlForm' => 'admin/desa/store',
            'titleHeading' => 'Tambah Data',
        ]);
    }

    public function store()
    {
        $data = [
            'kode_desa' => $this->input->post('kode_desa', TRUE),
            'nama_desa' => strtoupper($this->input->post('nama_desa', TRUE)),
        ];

        $this->db->insert('desa', $data);

        redirect(site_url('admin/desa'));
    }

    public function edit($id)
    {
        $desa = $this->db->get_where('desa', ['kode_desa' => $id,])->row();

        $this->load->view('role/admin/kode_desa/form_view', [
            'menuActive' => $this->menuActive,
            'isEdit' => true,
            'urlForm' => 'admin/desa/update/' . $id,
            'titleHeading' => 'Ubah Data',
            'desa' => $desa,
        ]);
    }

    public function update($id)
    {
        $data = [
            'kode_desa' => $this->input->post('kode_desa', TRUE),
            'nama_desa' => strtoupper($this->input->post('nama_desa', TRUE)),
        ];

        $this->db->where('kode_desa', $id)->update('desa', $data);

        redirect(site_url('admin/desa'));
    }

    public function delete($id)
    {
        $this->db->delete('desa', array('kode_desa' => $id));
        redirect(site_url('admin/desa'));
    }
}
