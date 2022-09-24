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
                            <label>Jenis Keperluan</label>
                            <input type="text" class="form-control" name="jenis_keperluan" value="<?= ($isEdit) ? $desa->jenis_keperluan : '' ?>" required>
                        </div>

                        <button class="btn btn-primary mr-1" type="submit" <?= ($isEdit) ? 'onclick="return confirm(`Apakah yakin ingin mengubah data berikut ini?`)"' : '' ?>>Simpan Data</button>
                        <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('admin/keperluan') ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
</section>

<?php $this->load->view('layouts/footer') ?>