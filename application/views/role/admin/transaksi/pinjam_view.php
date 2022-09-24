<?php $this->load->view('layouts/header') ?>

<?= $this->session->flashdata('alert'); ?>
<section class="section">
    <div class="section-header">
        <h1>Pinjam Buku Tanah</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <form class="card-body" action="<?= $url ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="desa_kode">Kode Desa</label>
                        <select name="desa_kode" class="form-control select2" required>
                            <?php if ($isEdit == FALSE) : ?>
                                <option value="" selected>Silahkan Pilih...</option>
                            <?php endif; ?>
                            <?php foreach ($desa as $item) : ?>
                                <option value="<?= $item->kode_desa ?>" <?php
                                                                        if ($isEdit) {
                                                                            if ($item->kode_desa == $transaksi->desa_kode) {
                                                                                echo 'selected';
                                                                            };
                                                                        }
                                                                        ?>>
                                    <?= $item->kode_desa . ' - ' . $item->nama_desa ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jenis_id">Jenis Hak</label>
                        <select name="jenis_id" class="form-control select2" required>
                            <?php if ($isEdit == FALSE) : ?>
                                <option value="" selected>Silahkan Pilih...</option>
                            <?php endif; ?>
                            <?php foreach ($jenisHak as $item) : ?>
                                <option value="<?= $item->id_jenis ?>" <?php
                                                                        if ($isEdit) {
                                                                            if ($item->id_jenis == $transaksi->jenis_id) {
                                                                                echo 'selected';
                                                                            };
                                                                        }
                                                                        ?>>
                                    <?= $item->nama_jenis ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="keperluan_id">Keperluan</label>
                        <select name="keperluan_id" class="form-control select2" required>
                            <?php if ($isEdit == FALSE) : ?>
                                <option value="" selected>Silahkan Pilih...</option>
                            <?php endif; ?>
                            <?php foreach ($keperluan as $item) : ?>
                                <option value="<?= $item->id_keperluan ?>" <?php
                                                                            if ($isEdit) {
                                                                                if ($item->id_keperluan == $transaksi->keperluan_id) {
                                                                                    echo 'selected';
                                                                                };
                                                                            }
                                                                            ?>>
                                    <?= $item->jenis_keperluan ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nomer_hak">Nomer Hak</label>
                        <input type="number" class="form-control" name="nomer_hak" placeholder="Masukkan/Input Manual Angka" value="<?= ($isEdit) ? $transaksi->nomer_hak : '' ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nomer_berkas">Nomer Berkas</label>
                        <input type="text" class="form-control" name="nomer_berkas" placeholder="Masukkan/Input Manual" value="<?= ($isEdit) ? $transaksi->nomer_berkas : '' ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tgl_pinjam" value="<?= ($isEdit) ? $transaksi->tgl_pinjam : '' ?>" required>
                    </div>
                </div>
                <button class="btn btn-primary mr-1" type="submit">Simpan Data</button>
                <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                <a class="btn btn-warning" href="<?= site_url('admin/laporan') ?>">Kembali ke Laporan</a>
            </form>
        </div>
    </div>
</section>

<?php $this->load->view('layouts/footer') ?>