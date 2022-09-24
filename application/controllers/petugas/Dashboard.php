<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Dashboard extends CI_Controller
{
    private $menuActive = 'dashboard';

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('login') == false || $this->session->userdata('level_user') != 'petugas') {
            redirect(site_url('/'));
        }
    }

    public function index()
    {
        $buttonActive = 'SEMUA';
        $filter = $this->input->get('filter');
        $perMonth   = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $perWeek   = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 7, date('Y')));
        $dateNow    = date('Y-m-d');

        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('desa', 'desa.kode_desa = transaksi.desa_kode');
        $this->db->join('jenis_hak', 'jenis_hak.id_jenis = transaksi.jenis_id');
        $this->db->join('keperluan', 'keperluan.id_keperluan = transaksi.keperluan_id');
        $this->db->join('user', 'user.nip = transaksi.user_nip');
        $this->db->where('user_nip', $this->session->userdata('nip'));

        if ($filter == 'minggu') {
            $this->db->where('tgl_pinjam >=', $perWeek);
            $this->db->where('tgl_pinjam <=', $dateNow);
            $buttonActive = 'MINGGU';
        }

        if ($filter == 'bulan') {
            $this->db->where('tgl_pinjam >=', $perMonth);
            $this->db->where('tgl_pinjam <=', $dateNow);
            $buttonActive = 'BULAN';
        }

        $laporan = $this->db->order_by('id_transaksi', 'DESC')->get()->result();

        $this->load->view('role/petugas/dashboard', [
            'menuActive' => $this->menuActive,
            'buttonActive' => $buttonActive,
            'laporan' => $laporan
        ]);
    }

    public function export_excel($filter = null)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $perMonth   = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));
        $perWeek    = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') - 7, date('Y')));
        $dateNow    = date('Y-m-d');

        // HEADER TITLE EXCEL
        $sheet->setCellValue('A1', "LAPORAN TRANSAKSI");
        $sheet->mergeCells('A1:K1');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getStyle('A1')->getFont()->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // INSERT IMAGE LOGO
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo');
        $drawing->setPath('./asset/img/logo.png');
        $drawing->setHeight(35);
        $drawing->setCoordinates('A1');
        $drawing->setWorksheet($spreadsheet->getActiveSheet());

        // HEADING TABLE
        $sheet->setCellValue('A3', "NO");
        $sheet->setCellValue('B3', "Kode Desa");
        $sheet->setCellValue('C3', "Nama Desa");
        $sheet->setCellValue('D3', "Nomer Hak");
        $sheet->setCellValue('E3', "Jenis Hak");
        $sheet->setCellValue('F3', "Nomer Berkas");
        $sheet->setCellValue('G3', "Petugas");
        $sheet->setCellValue('H3', "Jenis Petugas");
        $sheet->setCellValue('I3', "Tanggal Pinjam");
        $sheet->setCellValue('J3', "Tanggal Kembali");
        $sheet->setCellValue('K3', "Status");
        $sheet->setCellValue('L3', "Keperluan");
        $sheet->getStyle('A3:L3')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('81CACF');

        // AMBIL DATA TRANSAKSI DARI DATABASE
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('desa', 'desa.kode_desa = transaksi.desa_kode');
        $this->db->join('jenis_hak', 'jenis_hak.id_jenis = transaksi.jenis_id');
        $this->db->join('keperluan', 'keperluan.id_keperluan = transaksi.keperluan_id');
        $this->db->join('user', 'user.nip = transaksi.user_nip');
        $this->db->join('petugas', 'petugas.id_petugas = user.petugas_id');

        if ($filter == 'minggu') {
            $this->db->where('tgl_pinjam >=', $perWeek);
            $this->db->where('tgl_pinjam <=', $dateNow);
        }

        if ($filter == 'bulan') {
            $this->db->where('tgl_pinjam >=', $perMonth);
            $this->db->where('tgl_pinjam <=', $dateNow);
        }

        $this->db->where('user_nip', $this->session->userdata('nip'));
        $laporan = $this->db->order_by('id_transaksi', 'DESC')->get()->result();

        // PROSES INSERT DATA KE EXCEL
        $no = 1;
        $numrow = 4;
        foreach ($laporan as $data) {
            if ($data->status == null) {
                $status = 'PENGAJUAN';
            }

            if ($data->status == 'TERLIHAT') {
                $status = 'DIPINJAM';
            }

            if ($data->status == 'SETUJU') {
                $status = 'SUDAH KEMBALI';
            }

            $sheet->setCellValue('A' . $numrow, $no++);
            $sheet->setCellValue('B' . $numrow, $data->kode_desa);
            $sheet->setCellValue('C' . $numrow, $data->nama_desa);
            $sheet->setCellValue('D' . $numrow, $data->nomer_hak);
            $sheet->setCellValue('E' . $numrow, $data->nama_jenis);
            $sheet->setCellValue('F' . $numrow, $data->nomer_berkas);
            $sheet->setCellValue('G' . $numrow, $data->nama_user);
            $sheet->setCellValue('H' . $numrow, $data->jenis_petugas);
            $sheet->setCellValue('I' . $numrow, $data->tgl_pinjam);
            $sheet->setCellValue('J' . $numrow, ($data->tgl_kembali == null) ? 'Belum Kembali' : $data->tgl_kembali);
            $sheet->setCellValue('K' . $numrow, $status);
            $sheet->setCellValue('L' . $numrow, $data->jenis_keperluan);

            $numrow++;
        }

        // SET LEBAR KOLOM
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(25);
        $sheet->getColumnDimension('G')->setWidth(20);
        $sheet->getColumnDimension('H')->setWidth(15);
        $sheet->getColumnDimension('I')->setWidth(15);
        $sheet->getColumnDimension('J')->setWidth(15);
        $sheet->getColumnDimension('K')->setWidth(15);
        $sheet->getColumnDimension('L')->setWidth(20);

        // SET TINGGI SEMUA KOLOM JADI AUTO
        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        // SET ORIENTASI KERTAS
        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        // SET JUDUL FILE EXCEL
        $sheet->setTitle("Laporan Transaksi");

        // PROSES EXPORT FILE EXCEL
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Laporan Transaksi-' . ucfirst($filter) . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}
