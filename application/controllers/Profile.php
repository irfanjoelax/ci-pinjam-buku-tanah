<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    private $masterTable = "user";
    private $pathView = "profile/index_view";
    private $menuActive = 'profile';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false) {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $this->load->view($this->pathView, [
            'menuActive' => $this->menuActive,
        ]);
    }

    public function update($nip)
    {
        $user = $this->db->get_where($this->masterTable, ['nip' => $nip])->row();
        $password = $user->pass_user;

        if (!empty($this->input->post('pass_user', TRUE))) {
            $password = md5($this->input->post('pass_user', TRUE));
        }

        $data = [
            'nama_user'     => $this->input->post('nama_user', TRUE),
            'email_user'    => $this->input->post('email_user', TRUE),
            'pass_user'     => $password,
        ];

        $updateData = $this->db->where('nip', $nip)->update($this->masterTable, $data);

        if ($updateData) {
            $user = $this->db->get_where($this->masterTable, ['nip' => $nip])->row();

            $userSession = [
                'nip'       => $user->nip,
                'nama_user'     => $user->nama_user,
                'email_user'    => $user->email_user,
                'login'         => true,
            ];

            $this->session->set_userdata($userSession);

            if ($this->session->userdata('level_user') == 'admin') {
                redirect(site_url('/admin/dashboard'));
            }

            if ($this->session->userdata('level_user') == 'petugas') {
                redirect(site_url('/petugas/dashboard'));
            }
        }
    }
}
