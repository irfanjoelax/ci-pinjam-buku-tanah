<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Kode Desa</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('admin/desa/create') ?>" class="btn btn-primary">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Kode Wilayah</th>
                                        <th>Nama Wilayah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($desa as $item) : ?>
                                        <tr>
                                            <td class="align-middle text-center"><?= $no++ ?></td>
                                            <td class="align-middle"><?= $item->kode_desa ?></td>
                                            <td class="align-middle"><?= $item->nama_desa ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/desa/edit/' . $item->kode_desa) ?>" class="btn btn-sm btn-success mr-1">
                                                    Ubah
                                                </a>
                                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="<?= site_url('admin/desa/delete/' . $item->kode_desa) ?>" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </a>
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