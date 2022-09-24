<?php
$this->db->where('status', NULL);
$transaksiNull = $this->db->get('transaksi')->result();

$this->db->where('tgl_kembali !=', NULL);
$this->db->where('status !=', 'SETUJU');
$transaksiTerlihat = $this->db->get('transaksi')->result();
?>
<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?= ($transaksiNull == NULL) ? '' : 'beep' ?>">
        <i class="far fa-bell"></i>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header text-primary">Peminjaman Terbaru</div>
        <div class="dropdown-list-content dropdown-list-icons">
            <?php foreach ($transaksiNull as $item) : ?>
                <a href="<?= site_url('admin/laporan/set_terlihat/' . $item->id_transaksi) ?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        No. Berkas: <?= $item->nomer_berkas ?>
                        <div class="time">
                            PEMINJAMAN
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="dropdown-footer text-center">
            <a href="<?= site_url('admin/laporan') ?>">Lihat Semua <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>
<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg <?= ($transaksiTerlihat == NULL) ? '' : 'beep' ?>">
        <i class="far fa-envelope"></i>
    </a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header text-warning">Pengembalian Terbaru</div>
        <div class="dropdown-list-content dropdown-list-icons">
            <?php foreach ($transaksiTerlihat as $item) : ?>
                <a href="<?= site_url('admin/laporan/set_setuju/' . $item->id_transaksi) ?>" class="dropdown-item">
                    <div class="dropdown-item-icon bg-warning text-white">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        No. Berkas: <?= $item->nomer_berkas ?>
                        <div class="time">
                            PENGEMBALIAN
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="dropdown-footer text-center">
            <a href="<?= site_url('admin/laporan') ?>" class="text-warning">Lihat Semua <i class="fas fa-chevron-right"></i></a>
        </div>
    </div>
</li>