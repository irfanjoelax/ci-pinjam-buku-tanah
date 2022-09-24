<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Kembali Buku Tanah</h1>
    </div>

    <div class="section-body">
        <form class="row" method="GET" action="">
            <div class="col">
                <label for="nomer_hak" class="form-label">Nomer Hak</label>
                <input type="number" name="nomer_hak" class="form-control" placeholder="Masukkan Nomer Hak" value="<?= ($nomer_hak != null) ? $nomer_hak : '' ?>" required>
            </div>
            <div class="col">
                <label for="desa_kode" class="form-label">Kode Desa</label>
                <select name="desa_kode" class="form-control select2" required>
                    <option value="" selected>Pilih Kode Desa</option>
                    <?php foreach ($desa as $item) : ?>
                        <option value="<?= $item->kode_desa ?>" <?= ($item->kode_desa == $desa_kode) ? 'selected' : '' ?>>
                            <?= $item->kode_desa . ' - ' . $item->nama_desa ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="jenis_id" class="form-label">Jenis Hak</label>
                <select name="jenis_id" class="form-control select2" required>
                    <option value="" selected>Pilih Jenis Hak</option>
                    <?php foreach ($jenisHak as $item) : ?>
                        <option value="<?= $item->id_jenis ?>" <?= ($item->id_jenis == $jenis_id) ? 'selected' : '' ?>>
                            <?= $item->nama_jenis ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="nomer_hak" class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" class="form-control" value="<?= ($tgl_pinjam != null) ? $tgl_pinjam : '' ?>" required>
            </div>
            <div class="col">
                <label for="" class="form-label">&nbsp;</label>
                <button class="btn btn-primary w-100" type="submit">
                    Pencarian Buku Tanah
                </button>
            </div>
        </form>

        <hr>

        <?php if ($data != null) : ?>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td width="150">Kode Desa</td>
                                <td width="5">:</td>
                                <td><?= $data->kode_desa ?></td>
                            </tr>
                            <tr>
                                <td width="150">Nama Desa</td>
                                <td width="5">:</td>
                                <td><?= $data->nama_desa ?></td>
                            </tr>
                            <tr>
                                <td width="150">Jenis Hak</td>
                                <td width="5">:</td>
                                <td><?= $data->nama_jenis ?></td>
                            </tr>
                            <tr>
                                <td width="150">Nama Petugas</td>
                                <td width="5">:</td>
                                <td><?= $data->nama_user ?></td>
                            </tr>
                            <tr>
                                <td width="150">Jenis Petugas</td>
                                <td width="5">:</td>
                                <td><?= $data->jenis_petugas ?></td>
                            </tr>
                            <tr>
                                <td width="150">Keperluan</td>
                                <td width="5">:</td>
                                <td><?= $data->jenis_keperluan ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td width="175">Nomer Hak</td>
                                <td width="5">:</td>
                                <td><?= $data->nomer_hak ?></td>
                            </tr>
                            <tr>
                                <td width="175">Nomer Berkas</td>
                                <td width="5">:</td>
                                <td><?= $data->nomer_berkas ?></td>
                            </tr>
                            <tr>
                                <td width="175">Tanggal Pinjam</td>
                                <td width="5">:</td>
                                <td><?= $data->tgl_pinjam ?></td>
                            </tr>
                            <tr>
                                <td width="175">Tanggal Kembali</td>
                                <td width="5">:</td>
                                <td>
                                    <?= ($data->tgl_kembali == null) ? '<small class="badge badge-danger">Belum Kembali</small>' : $data->tgl_kembali ?>
                                </td>
                            </tr>

                            <?php if ($data->tgl_kembali == null and $data->status != NULL) : ?>
                                <tr>
                                    <td colspan="3">
                                        <form class="form-inline" method="POST" action="<?= site_url('petugas/transaksi/kembali_store/' . $data->id_transaksi) ?>">
                                            <input type="date" class="form-control mr-2" name="tgl_kembali" required>
                                            <button type="submit" class="btn btn-warning">
                                                Kembalikan Buku Tanah
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php $this->load->view('layouts/footer') ?>