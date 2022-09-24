<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>

    <link rel="shortcut icon" href="<?= base_url() ?>/asset/img/logo_bpn.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/stisla.css">
</head>

<body class="bg-light">
<header class="bg-white">
        <div class="container py-3">
            <div class="d-flex align-items-center">
                <img src="<?= base_url() ?>/asset/img/logo_bpn.png" width="125">
                <div class="ml-3 mt-2">
                    <h3 class="fw-bold mb-1">
                        <?= APP_NAME ?>
                    </h3>
                    <p class="text-muted">
                        
                    </p>
                </div>
            </div>
        </div>
    </header>

    <nav class="bg-primary">
        <div class="container d-flex align-items-center justify-content-between">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="#">Sekilas Pusat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="#">Visi & Misi</a>
                </li>
            </ul>
            <ul class="nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="<?= site_url('auth') ?>">Login</a> -->
                </li>
            </ul>
        </div>
    </nav>

    <main class="container my-5 py-3">
        <div class="row">
            <div class="col-md-5 col-12 align-self-center">
                <h1 class="display-4 fw-semibold">Selamat datang</h1>
                <p class="text-muted">
                    Sistem Informasi Rekapitulasi Buku Tanah</p>
                <a class="btn btn-primary btn-lg mt-3 px-4" href="<?= site_url('auth') ?>" role="button">
                    Masuk
                </a>
            </div>
            <div class="col-md-7 col-12">
            <div class="card">
           
                  <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" src="<?= base_url() ?>/asset/img/k1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?= base_url() ?>/asset/img/k2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                          <img class="d-block w-100" src="<?= base_url() ?>/asset/img/k3.png" alt="Third slide">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p class=" text-center text-black-50">
       </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>/asset/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/asset/js/bootstrap.min.js"></script>
</body>

</html>