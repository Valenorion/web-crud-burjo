<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vermata - Burjo<?= $title ?? 'Home' ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/open-iconic-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/animate.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/magnific-popup.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/aos.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/jquery.timepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('coffee1-1.0.0/css/style.css') ?>">
    
    <style>
        .user-info {
            color: white !important;
            margin-left: 15px;
            padding: 5px 10px;
            background: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        .logout-btn {
            color: #ff6b6b !important;
        }
        .logout-btn:hover {
            color: #ff4757 !important;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">Vermata<small>Burjo</small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item <?= (uri_string() == '') ? 'active' : '' ?>">
                    <a href="<?= base_url('/') ?>" class="nav-link">Home</a>
                </li>

                <li class="nav-item <?= (uri_string() == 'menu') ? 'active' : '' ?>">
                    <a href="<?= base_url('/menu') ?>" class="nav-link">Menu</a>
                </li>

                <li class="nav-item <?= (uri_string() == 'about') ? 'active' : '' ?>">
                    <a href="<?= base_url('/about') ?>" class="nav-link">About</a>
                </li>

                <!-- Menu khusus Admin (hanya muncul jika role = admin) -->
                <?php if (session()->get('isLoggedIn') && session()->get('role') == 'admin'): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-shield"></i> Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="adminDropdown">
                        <a class="dropdown-item" href="<?= base_url('/admin/dashboard') ?>">
                            <i class="icon-dashboard"></i> Dashboard
                        </a>
                    </div>
                </li>
                <?php endif; ?>
                
                <!-- Tampilkan jika sudah login -->
                <?php if (session()->get('isLoggedIn')): ?>
                <li class="nav-item">
                    <a href="#" class="nav-link user-info">
                        <i class="icon-user"></i> <?= session()->get('username') ?> (<?= session()->get('role') ?>)
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/logout') ?>" class="nav-link logout-btn">
                        <i class="icon-sign-out"></i> Logout
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?= base_url('/login') ?>" class="nav-link">
                        <i class="icon-key"></i> Login
                    </a>
                </li>
                <?php endif; ?>
                
                <!-- Cart Icon -->
                <li class="nav-item cart">
                    <a href="<?= base_url('/cart') ?>" class="nav-link">
                        <span class="icon icon-shopping_cart"></span>
                        <span class="bag d-flex justify-content-center align-items-center">
                            <small>0</small>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->