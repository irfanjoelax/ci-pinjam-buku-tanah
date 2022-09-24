<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $titleHeading ?></h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <form class="card-body" action="<?= site_url($urlForm) ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Jenis Hak</label>
                            <input type="text" class="form-control" name="nama_jenis" value="<?= ($isEdit) ? $desa->nama_jenis : '' ?>" required>
                        </div>

                        <button class="btn btn-primary mr-1" type="submit" <?= ($isEdit) ? 'onclick="return confirm(`Apakah yakin ingin mengubah data berikut ini?`)"' : '' ?>>Simpan Data</button>
                        <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('admin/jenis') ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
</section>

<?php $this->load->view('layouts/footer') ?>