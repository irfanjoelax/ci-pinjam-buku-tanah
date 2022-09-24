<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1><?= $titleHeading ?></h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <form class="card-body" action="<?= site_url($urlForm) ?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nip">NIP/NIK</label>
                                <input type="text" class="form-control" name="nip" value="<?= ($isEdit) ? $user->nip : '' ?>" required>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="nama_user">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_user" value="<?= ($isEdit) ? $user->nama_user : '' ?>" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                <label for="email_user">Email User</label>
                                <input type="email" class="form-control" name="email_user" value="<?= ($isEdit) ? $user->email_user : '' ?>" required>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Jenis Petugas</label>
                                <select name="petugas_id" class="form-control select2" required>
                                    <?php if ($isEdit == false) : ?>
                                        <option value="" selected>Silahkan Pilih...</option>
                                    <?php endif; ?>
                                    <?php foreach ($petugas as $item) : ?>
                                        <option value="<?= $item->id_petugas ?>" <?php
                                                                                    if ($isEdit) {
                                                                                        ($item->id_petugas == $user->petugas_id) ? 'selected' : '';
                                                                                    }
                                                                                    ?>>
                                            <?= $item->jenis_petugas ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Level User</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="level_user" value="petugas" class="selectgroup-input" <?= ($isEdit && $user->level_user == 'petugas') ? 'checked' : ''  ?>>
                                    <span class="selectgroup-button">Petugas</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="level_user" value="admin" class="selectgroup-input" <?= ($isEdit && $user->level_user == 'admin') ? 'checked' : ''  ?>>
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                            </div>
                        </div>
                        <?php if ($isEdit == false) : ?>
                            <p class="text-danger">
                                <small>* Password Default User/Petugas Baru: 123456</small>
                            </p>
                        <?php endif; ?>
                        <button class="btn btn-primary mr-1" type="submit" <?= ($isEdit) ? 'onclick="return confirm(`Apakah yakin ingin mengubah data berikut ini?`)"' : '' ?>>Simpan Data</button>
                        <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('admin/user') ?>">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
</section>

<?php $this->load->view('layouts/footer') ?>