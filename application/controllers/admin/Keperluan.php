<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keperluan extends CI_Controller
{
    private $masterTable = "keperluan";
    private $menuActive = 'keperluan';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $jenis = $this->db->order_by('id_keperluan', 'DESC')->get($this->masterTable)->result();

        $this->load->view('role/admin/keperluan/index_view', [
            'menuActive' => $this->menuActive,
            'jenis' => $jenis,
        ]);
    }

    public function create()
    {
        $this->load->view('role/admin/keperluan/form_view', [
            'menuActive' => $this->menuActive,
            'isEdit' => false,
            'urlForm' => 'admin/keperluan/store',
            'titleHeading' => 'Tambah Data',
        ]);
    }

    public function store()
    {
        $data = [
            'jenis_keperluan' => strtoupper($this->input->post('jenis_keperluan', TRUE)),
        ];

        $this->db->insert($this->masterTable, $data);

        redirect(site_url('admin/keperluan'));
    }

    public function edit($id)
    {
        $desa = $this->db->get_where($this->masterTable, ['id_keperluan' => $id,])->row();

        $this->load->view('role/admin/keperluan/form_view', [
            'menuActive' => $this->menuActive,
            'isEdit'        => true,
            'urlForm'       => 'admin/keperluan/update/' . $id,
            'titleHeading'  => 'Ubah Data',
            'desa'          => $desa,
        ]);
    }

    public function update($id)
    {
        $data = [
            'jenis_keperluan' => strtoupper($this->input->post('jenis_keperluan', TRUE)),
        ];

        $this->db->where('id_keperluan', $id)->update($this->masterTable, $data);

        redirect(site_url('admin/keperluan'));
    }

    public function delete($id)
    {
        $this->db->delete($this->masterTable, array('id_keperluan' => $id));
        redirect(site_url('admin/keperluan'));
    }
}
