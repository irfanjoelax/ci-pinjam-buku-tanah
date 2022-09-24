<li class="menu-header">Dashboard</li>
<li class="<?= ($menuActive == 'dashboard') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/petugas/dashboard') ?>">
        <i class="fas fa-fire"></i> <span>Dashboard</span>
    </a>
</li>
<li class="menu-header">Transaksi</li>
<li class="<?= ($menuActive == 'pinjam') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/petugas/transaksi/pinjam') ?>">
        <i class="fas fa-sign-out-alt"></i> <span>Peminjaman</span>
    </a>
</li>
<li class="<?= ($menuActive == 'kembali') ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('/petugas/transaksi/kembali') ?>">
        <i class="fas fa-sign-in-alt"></i> <span>Kembalikan</span>
    </a>
</li>