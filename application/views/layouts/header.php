<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
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
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/datatables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/select2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/asset/css/components.css">
</head>

<body onload="refresh()">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </div>
                <ul class="navbar-nav navbar-right">
                    <?php
                    if ($this->session->userdata('level_user') == 'admin') {
                        $this->load->view('layouts/notification');
                    }
                    ?>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/asset/img/avatar.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">
                                <?= $this->session->userdata('nama_user') ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('profile') ?>" class="dropdown-item has-icon">
                                <i class="fas fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a onclick="return confirm('Apakah kamu yakin ingin keluar aplikasi?')" href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Keluar
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="#" class="">
                            <img src="<?= base_url() ?>/asset/img/logo_bpn.png" width="55">
                        </a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="#">
                            <img src="<?= base_url() ?>/asset/img/logo_bpn.png" width="35">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <?php
                        if ($this->session->userdata('level_user') == 'admin') {
                            $this->load->view('layouts/nav_admin');
                        }

                        if ($this->session->userdata('level_user') == 'petugas') {
                            $this->load->view('layouts/nav_petugas');
                        }
                        ?>
                    </ul>

                    <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> App Version 1.0.0
                        </a>
                    </div> -->
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">