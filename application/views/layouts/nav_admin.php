<li class="menu-header">Dashboard</li>
<li class="<?= ($menuActive == 'dashboard') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/dashboard') ?>">
        <i class="fas fa-fire"></i> <span>Dashboard</span>
    </a>
</li>
<li class="menu-header">Master Data</li>
<li class="<?= ($menuActive == 'kode_desa') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/desa') ?>">
        <i class="fas fa-dungeon"></i> <span>Kode Desa</span>
    </a>
</li>
<li class="<?= ($menuActive == 'jenis_hak') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/jenis') ?>">
        <i class="fas fa-ribbon"></i> <span>Jenis Hak</span>
    </a>
</li>
<li class="<?= ($menuActive == 'keperluan') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/keperluan') ?>">
        <i class="fas fa-comment-alt"></i> <span>Keperluan</span>
    </a>
</li>
<li class="<?= ($menuActive == 'petugas') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/petugas') ?>">
        <i class="fas fa-user-tie"></i> <span>Jenis Petugas</span>
    </a>
</li>
<li class="<?= ($menuActive == 'user') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/user') ?>">
        <i class="fas fa-users"></i> <span>Daftar User/Petugas</span>
    </a>
</li>
<li class="menu-header">Transaksi</li>
<li class="<?= ($menuActive == 'pinjam') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/transaksi/pinjam') ?>">
        <i class="fas fa-sign-out-alt"></i> <span>Peminjaman</span>
    </a>
</li>
<li class="<?= ($menuActive == 'kembali') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/transaksi/kembali') ?>">
        <i class="fas fa-sign-in-alt"></i> <span>Kembalikan</span>
    </a>
</li>
<li class="menu-header">Laporan</li>
<li class="<?= ($menuActive == 'laporan') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/admin/laporan') ?>">
        <i class="fas fa-file-alt"></i> <span>Transaksi</span>
    </a>
</li>