<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Petugas</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('admin/petugas/create') ?>" class="btn btn-primary">
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
                                        <th>Jenis Petugas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($petugas as $item) : ?>
                                        <tr>
                                            <td class="align-middle text-center"><?= $no++ ?></td>
                                            <td class="align-middle"><?= $item->jenis_petugas ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/petugas/edit/' . $item->id_petugas) ?>" class="btn btn-sm btn-success mr-1">
                                                    Ubah
                                                </a>
                                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="<?= site_url('admin/petugas/delete/' . $item->id_petugas) ?>" class="btn btn-sm btn-danger">
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