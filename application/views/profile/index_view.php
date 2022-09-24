<?php $this->load->view('layouts/header') ?>

<section class="section">
    <div class="section-header">
        <h1>Pengaturan Profile</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <form class="card-body" action="<?= site_url('profile/update/' . $this->session->userdata('nip')) ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_user" value="<?= $this->session->userdata('nama_user') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_user" value="<?= $this->session->userdata('email_user') ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass_user" placeholder="***">
                            <small class="form-text text-danger">
                                Jika tidak ingin mengubah Password harap kosongkan
                            </small>
                        </div>

                        <button class="btn btn-primary mr-1" type="submit">Simpan Data</button>
                        <button class="btn btn-secondary mr-1" type="reset">Reset</button>
                        <!-- <a class="btn btn-warning" href="">Kembali</a> -->
                    </form>
                </div>
            </div>
        </div>
</section>

<?php $this->load->view('layouts/footer') ?>