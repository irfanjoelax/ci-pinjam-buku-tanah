<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= APP_NAME ?></title>

    <link rel="shortcut icon" href="<?= base_url() ?>/asset/img/logo_bpn.png" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/fontawesome/css/all.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>/asset/img/logo_bpn.png" alt="logo" width="100">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Halaman Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?= site_url('auth/login') ?>">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" placeholder="contoh@example.com" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="<?= site_url('auth/forget_password') ?>" class="text-small">
                                                    Lupa Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="***" tabindex="2" required>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="3">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; <?= APP_NAME ?> <div class="bullet"></div> <?= date('Y') ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?= $this->session->flashdata('alert'); ?>
</body>

</html>