<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Laporan Data Transaksi</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <a href="<?= site_url('admin/laporan/') ?>" class="btn <?= ($buttonActive == 'SEMUA') ? 'btn-dark' : 'btn-light' ?> mr-2">
                                Semua
                            </a>
                            <a href="<?= site_url('admin/laporan?filter=minggu') ?>" class="btn <?= ($buttonActive == 'MINGGU') ? 'btn-dark' : 'btn-light' ?> mr-2">
                                Minggu
                            </a>
                            <a href="<?= site_url('admin/laporan?filter=bulan') ?>" class="btn <?= ($buttonActive == 'BULAN') ? 'btn-dark' : 'btn-light' ?> mr-2">
                                Bulan
                            </a>
                        </h4>

                        <div class="card-header-action">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Export Excel
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= site_url('admin/laporan/export_excel') ?>">Semua</a>
                                <a class="dropdown-item" href="<?= site_url('admin/laporan/export_excel/minggu') ?>">Minggu</a>
                                <a class="dropdown-item" href="<?= site_url('admin/laporan/export_excel/bulan') ?>">Bulan</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Desa</th>
                                        <th>Hak</th>
                                        <th>Petugas/No.Berkas</th>
                                        <th>Tgl. Pinjam & Kembali</th>
                                        <th>Keperluan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($laporan as $item) : ?>
                                        <tr>
                                            <td class="align-top text-center">
                                                <a href="<?= site_url('admin/transaksi/pinjam_ubah/' . $item->id_transaksi) ?>" class="text-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td class="align-top">
                                                <?= $item->nama_desa ?>
                                                <br>
                                                <small><?= $item->kode_desa ?></small>
                                            </td>
                                            <td class="align-top">
                                                <a href="<?= site_url('admin/transaksi/kembali?nomer_hak=' . $item->nomer_hak . '&desa_kode=' . $item->desa_kode . '&jenis_id=' . $item->jenis_id . '&tgl_pinjam=' . $item->tgl_pinjam) ?>" class="">

                                                    <?= $item->nomer_hak ?>
                                                    <i class="fas fa-link"></i>
                                                </a>
                                                <br>
                                                <small class="text-dark"><?= $item->nama_jenis ?></small>
                                            </td>
                                            <td class="align-top">
                                                <?= $item->nama_user ?>
                                                <br>
                                                <small><?= $item->nomer_berkas ?></small>
                                            </td>
                                            <td class="align-top">
                                                <?= $item->tgl_pinjam ?>
                                                <br>
                                                <small>
                                                    <?= ($item->tgl_kembali == null) ? 'Belum Kembali' : $item->tgl_kembali ?>
                                                </small>
                                            </td>
                                            <td class="align-top">
                                                <?= $item->jenis_keperluan ?>
                                            </td>
                                            <td class="align-top">
                                                <?php if ($item->status == NULL) : ?>
                                                    <a href="<?= site_url('admin/laporan/set_terlihat/' . $item->id_transaksi) ?>" class="badge badge-danger">
                                                        <small>Pengajuan</small>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($item->status == 'TERLIHAT') : ?>
                                                    <a href="<?= ($item->tgl_kembali != null) ? site_url('admin/laporan/set_setuju/' . $item->id_transaksi)  : '#' ?>" class="badge badge-warning">
                                                        <small>Dipinjam</small>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if ($item->status == 'SETUJU') : ?>
                                                    <span class="badge badge-primary">
                                                        <small>Sudah Kembali</small>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer') ?>