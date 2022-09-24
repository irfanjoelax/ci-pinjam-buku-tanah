<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    private $masterTable = "petugas";
    private $pathView = "role/admin/petugas/";
    private $menuActive = 'petugas';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $petugas = $this->db->order_by('id_petugas', 'DESC')->get($this->masterTable)->result();

        $this->load->view($this->pathView . 'index_view', [
            'menuActive' => $this->menuActive,
            'petugas' => $petugas,
        ]);
    }

    public function create()
    {
        $this->load->view($this->pathView . 'form_view', [
            'menuActive' => $this->menuActive,
            'isEdit' => false,
            'urlForm' => 'admin/petugas/store',
            'titleHeading' => 'Tambah Data',
        ]);
    }

    public function store()
    {
        $data = [
            'jenis_petugas' => strtoupper($this->input->post('jenis_petugas', TRUE)),
        ];

        $this->db->insert($this->masterTable, $data);

        redirect(site_url('admin/petugas'));
    }

    public function edit($id)
    {
        $desa = $this->db->get_where($this->masterTable, ['id_petugas' => $id,])->row();

        $this->load->view($this->pathView . 'form_view', [
            'menuActive' => $this->menuActive,
            'isEdit'        => true,
            'urlForm'       => 'admin/petugas/update/' . $id,
            'titleHeading'  => 'Ubah Data',
            'desa'          => $desa,
        ]);
    }

    public function update($id)
    {
        $data = [
            'jenis_petugas' => strtoupper($this->input->post('jenis_petugas', TRUE)),
        ];

        $this->db->where('id_petugas', $id)->update($this->masterTable, $data);

        redirect(site_url('admin/petugas'));
    }

    public function delete($id)
    {
        $this->db->delete($this->masterTable, array('id_petugas' => $id));
        redirect(site_url('admin/petugas'));
    }
}
