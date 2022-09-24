<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-dungeon"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Desa</h4>
                        </div>
                        <div class="card-body">
                            <?= $totalDesa ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-ribbon"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jenis Hak</h4>
                        </div>
                        <div class="card-body">
                            <?= $totalJenisHak ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Petugas</h4>
                        </div>
                        <div class="card-body">
                            <?= $totalPetugas ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            <?= $totalUser ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pinjam/Kembali Buku Tanah Terbaru</h4>
                        <div class="card-header-action">
                            <a href="<?= site_url('admin/laporan') ?>" class="btn btn-secondary">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No./Jenis Hak</th>
                                        <th>Desa</th>
                                        <th>Petugas/No.Berkas</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($laporan as $item) : ?>
                                        <tr>
                                            <td class="align-top">
                                                <?= $item->nomer_hak ?> <br>
                                                <small class="text-primary"><?= $item->nama_jenis ?></small>
                                            </td>
                                            <td class="align-top">
                                                <?= $item->nama_desa ?> <br>
                                                <small class="text-primary"><?= $item->kode_desa ?></small>
                                            </td>
                                            <td class="align-top">
                                                <?= $item->nomer_berkas ?> <br>
                                                <small class="text-primary"><?= $item->nama_user ?> </small>
                                            </td>
                                            <td class="align-top">
                                                <?= ($item->tgl_kembali == null) ? 'Belum Kembali' : $item->tgl_kembali ?> <br>
                                                <small class="text-primary"><?= $item->tgl_pinjam ?> </small>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer') ?>