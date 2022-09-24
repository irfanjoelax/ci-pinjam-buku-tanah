<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    private $masterTable = "jenis_hak";
    private $menuActive = 'jenis_hak';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $jenis = $this->db->order_by('id_jenis', 'DESC')->get($this->masterTable)->result();

        $this->load->view('role/admin/jenis_hak/index_view', [
            'menuActive' => $this->menuActive,
            'jenis' => $jenis,
        ]);
    }

    public function create()
    {
        $this->load->view('role/admin/jenis_hak/form_view', [
            'menuActive' => $this->menuActive,
            'isEdit' => false,
            'urlForm' => 'admin/jenis/store',
            'titleHeading' => 'Tambah Data',
        ]);
    }

    public function store()
    {
        $data = [
            'nama_jenis' => strtoupper($this->input->post('nama_jenis', TRUE)),
        ];

        $this->db->insert($this->masterTable, $data);

        redirect(site_url('admin/jenis'));
    }

    public function edit($id)
    {
        $desa = $this->db->get_where($this->masterTable, ['id_jenis' => $id,])->row();

        $this->load->view('role/admin/jenis_hak/form_view', [
            'menuActive' => $this->menuActive,
            'isEdit'        => true,
            'urlForm'       => 'admin/jenis/update/' . $id,
            'titleHeading'  => 'Ubah Data',
            'desa'          => $desa,
        ]);
    }

    public function update($id)
    {
        $data = [
            'nama_jenis' => strtoupper($this->input->post('nama_jenis', TRUE)),
        ];

        $this->db->where('id_jenis', $id)->update($this->masterTable, $data);

        redirect(site_url('admin/jenis'));
    }

    public function delete($id)
    {
        $this->db->delete($this->masterTable, array('id_jenis' => $id));
        redirect(site_url('admin/jenis'));
    }
}
