<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $menuActive = 'dashboard';

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'admin') {
			redirect(site_url('/'));
		}
	}

	public function index()
	{
		$totalDesa = $this->db->get('desa')->num_rows();
		$totalJenisHak = $this->db->get('jenis_hak')->num_rows();
		$totalPetugas = $this->db->get('petugas')->num_rows();
		$totalUser = $this->db->get('user')->num_rows();

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('desa', 'desa.kode_desa = transaksi.desa_kode');
		$this->db->join('jenis_hak', 'jenis_hak.id_jenis = transaksi.jenis_id');
		$this->db->join('user', 'user.nip = transaksi.user_nip');
		$this->db->order_by('id_transaksi', 'DESC');
		$laporan = $this->db->limit(5)->get()->result();

		$totalPinjam = $this->db->get('transaksi')->num_rows();
		$terpinjam = $this->db->where('tgl_kembali !=', null)->get('transaksi')->num_rows();
		$belumKembali = $this->db->where('tgl_kembali', null)->get('transaksi')->num_rows();

		$this->load->view('role/admin/dashboard', [
			'menuActive' => $this->menuActive,
			'totalDesa' => $totalDesa,
			'totalJenisHak' => $totalJenisHak,
			'totalPetugas' => $totalPetugas,
			'totalUser' => $totalUser,
			'laporan' => $laporan,
			'totalPinjam' => $totalPinjam,
			'terpinjam' => $terpinjam,
			'belumKembali' => $belumKembali,
		]);
	}
}
