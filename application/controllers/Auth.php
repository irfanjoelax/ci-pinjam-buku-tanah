<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    private $masterTable = "user";
    private $pathView = "auth/";

    public function index()
    {
        $this->load->view($this->pathView . 'login_view');
    }

    public function login()
    {
        $where = array(
            'email_user'  => $this->input->post('email', TRUE),
            'pass_user'   => md5($this->input->post('password', TRUE)),
        );

        $user = $this->db->get_where($this->masterTable, $where)->row();

        // var_dump($user);
        if ($user) {
            $userSession = [
                'nip'           => $user->nip,
                'nama_user'     => $user->nama_user,
                'email_user'    => $user->email_user,
                'level_user'    => $user->level_user,
                'login'         => true,
            ];

            $this->session->set_userdata($userSession);

            if ($this->session->userdata('level_user') == 'admin') {
                redirect(site_url('/admin/dashboard'));
            }

            if ($this->session->userdata('level_user') == 'petugas') {
                redirect(site_url('/petugas/dashboard'));
            }
        } else {
            $this->session->set_flashdata('alert', '<script>alert(`Email atau Password yang dimasukkan salah!`)</script>');

            redirect(site_url('auth'));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('/'));
    }

    public function forget_password()
    {
        $this->load->view($this->pathView . 'forget-password_view');
    }

    public function send_verification()
    {
        $validToken = [
            'eb0a191797624dd3a48fa681d3061212',
            'e0e1d64fdac4188f087c4d44060de65e',
            '8692fc447f13b2256b0b4e381de7f382',
            '60a114c91c41983174b484e188856fb3',
            'f0b2246fd360b98b6317d874da98bfff',
        ];

        $randomToken = array_rand($validToken, 1);

        $this->load->helper('mailer');

        $to = $this->input->post('email', TRUE);
        $subject = 'Verifikasi Email Lupa Password';
        $body = '
            <h2>Verifikasi Email</h2>
            <p>Untuk reset password silakan klik link di bawah ini:</p>
            <a href="' . site_url('auth/reset_password/' . $validToken[$randomToken] . '/' . $to) . '">
                Reset Password
            </a>
        ';

        mailer($to, $subject, $body);

        redirect(site_url('/auth'));
    }

    public function reset_password($token, $email)
    {
        $validToken = [
            'eb0a191797624dd3a48fa681d3061212',
            'e0e1d64fdac4188f087c4d44060de65e',
            '8692fc447f13b2256b0b4e381de7f382',
            '60a114c91c41983174b484e188856fb3',
            'f0b2246fd360b98b6317d874da98bfff',
        ];

        if (in_array($token, $validToken)) {
            $this->load->view($this->pathView . 'reset-password_view', [
                'email' => $email
            ]);
        } else {
            redirect(site_url('/auth'));
        }
    }

    public function update_password()
    {
        $email = $this->input->post('email', TRUE);

        $data = [
            'pass_user' => md5($this->input->post('password', TRUE))
        ];

        $this->db->where('email_user', $email)->update($this->masterTable, $data);

        redirect(site_url('/auth'));
    }
}
