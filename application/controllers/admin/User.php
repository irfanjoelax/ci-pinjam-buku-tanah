<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $masterTable = "user";
    private $pathView = "role/admin/user/";
    private $menuActive = 'user';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from($this->masterTable);
        $this->db->join('petugas', 'petugas.id_petugas = user.petugas_id');
        $user = $this->db->order_by('nip', 'DESC')->get()->result();

        $this->load->view($this->pathView . 'index_view', [
            'menuActive' => $this->menuActive,
            'user' => $user,
        ]);
    }

    public function create()
    {
        $petugas = $this->db->order_by('id_petugas', 'DESC')->get('petugas')->result();

        $this->load->view($this->pathView . 'form_view', [
            'menuActive' => $this->menuActive,
            'isEdit' => false,
            'urlForm' => 'admin/user/store',
            'titleHeading' => 'Tambah Data',
            'petugas' => $petugas,
        ]);
    }

    public function store()
    {
        $data = [
            'nip'           => $this->input->post('nip', TRUE),
            'nama_user'     => strtoupper($this->input->post('nama_user', TRUE)),
            'email_user'    => $this->input->post('email_user', TRUE),
            'pass_user'     => md5('123456'),
            'level_user'    => $this->input->post('level_user', TRUE),
            'petugas_id'    => $this->input->post('petugas_id', TRUE),
        ];

        $this->db->insert($this->masterTable, $data);

        redirect(site_url('admin/user'));
    }

    public function edit($nip)
    {
        $user = $this->db->get_where($this->masterTable, ['nip' => $nip,])->row();
        $petugas = $this->db->order_by('id_petugas', 'DESC')->get('petugas')->result();

        $this->load->view($this->pathView . 'form_view', [
            'menuActive' => $this->menuActive,
            'isEdit'        => true,
            'urlForm'       => 'admin/user/update/' . $nip,
            'titleHeading'  => 'Ubah Data',
            'user'          => $user,
            'petugas'       => $petugas,
        ]);
    }

    public function update($nip)
    {
        $data = [
            'nip'           => $this->input->post('nip', TRUE),
            'nama_user'     => strtoupper($this->input->post('nama_user', TRUE)),
            'email_user'    => $this->input->post('email_user', TRUE),
            'pass_user'     => md5('123456'),
            'level_user'    => $this->input->post('level_user', TRUE),
            'petugas_id'    => $this->input->post('petugas_id', TRUE),
        ];

        $this->db->where('nip', $nip)->update($this->masterTable, $data);

        redirect(site_url('admin/user'));
    }

    public function delete($nip)
    {
        $this->db->delete($this->masterTable, array('nip' => $nip));
        redirect(site_url('admin/user'));
    }
}
