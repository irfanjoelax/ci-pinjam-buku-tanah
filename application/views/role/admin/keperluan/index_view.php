<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Data Keperluan</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= site_url('admin/keperluan/create') ?>" class="btn btn-primary">
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
                                        <th>Jenis Keperluan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jenis as $item) : ?>
                                        <tr>
                                            <td class="align-middle text-center"><?= $no++ ?></td>
                                            <td class="align-middle"><?= $item->jenis_keperluan ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/keperluan/edit/' . $item->id_keperluan) ?>" class="btn btn-sm btn-success mr-1">
                                                    Ubah
                                                </a>
                                                <a onclick="return confirm('Apakah anda yakin menghapus data ini?')" href="<?= site_url('admin/keperluan/delete/' . $item->id_keperluan) ?>" class="btn btn-sm btn-danger">
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