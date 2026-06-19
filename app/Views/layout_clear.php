<?php
$hlm = "Login";
if(uri_string()!=""){
  $hlm = ucwords(uri_string());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vermata - <?= $hlm ?></title>
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
    
    <!-- FontAwesome 6 (untuk ikon mangkok) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --coffee-primary: #c49b6f;
            --coffee-dark:    #8b5e3c;
            --coffee-gold:    #d4a853;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: #1a0e06;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient glow blobs */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }
        body::before {
            width: 420px; height: 420px;
            top: -100px; left: -80px;
            background: radial-gradient(circle, rgba(196,155,111,0.18) 0%, transparent 70%);
        }
        body::after {
            width: 360px; height: 360px;
            bottom: -80px; right: -60px;
            background: radial-gradient(circle, rgba(139,94,60,0.15) 0%, transparent 70%);
        }

        /* ── Card wrapper ── */
        .login-wrapper {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 420px;
        }

        /* ── Brand header above card ── */
        .login-brand {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-brand .brand-icon-box {
            width: 64px; height: 64px;
            background: linear-gradient(135deg, var(--coffee-primary), var(--coffee-dark));
            border-radius: 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px;
            box-shadow: 0 8px 24px rgba(196,155,111,0.25);
        }
        .login-brand .brand-icon-box i {
            font-size: 30px;
            color: #fff;
        }
        .login-brand h1 {
            font-family: 'Great Vibes', cursive;
            font-size: 42px;
            color: #f5ece0;
            margin: 0 0 4px;
            line-height: 1;
        }
        .login-brand p {
            font-size: 13px;
            color: rgba(245,236,224,0.45);
            margin: 0;
        }

        /* ── Glass card ── */
        .login-card {
            background: rgba(255,251,245,0.055);
            border: 1px solid rgba(196,155,111,0.2);
            border-radius: 20px;
            padding: 36px 32px;
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            animation: fadeUp .6s ease-out both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-card h2 {
            font-size: 20px;
            font-weight: 600;
            color: #f5ece0;
            margin: 0 0 4px;
        }
        .login-card .login-sub {
            font-size: 13px;
            color: rgba(245,236,224,0.45);
            margin: 0 0 28px;
        }

        /* ── Form elements ── */
        .form-group { margin-bottom: 18px; }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: rgba(245,236,224,0.6);
            margin-bottom: 8px;
            letter-spacing: 0.3px;
        }
        .form-group label i {
            margin-right: 5px;
            color: var(--coffee-primary);
            opacity: 0.8;
        }

        .input-group-custom {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-icon {
            position: absolute;
            left: 14px;
            color: rgba(196,155,111,0.65);
            font-size: 18px;
            z-index: 1;
            pointer-events: none;
        }

        .form-control-custom {
            width: 100%;
            padding: 13px 14px 13px 44px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(196,155,111,0.25);
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            color: #f5ece0;
            transition: border-color .25s, box-shadow .25s;
            outline: none;
        }
        .form-control-custom::placeholder { color: rgba(245,236,224,0.3); }
        .form-control-custom:focus {
            border-color: rgba(196,155,111,0.75);
            box-shadow: 0 0 0 3px rgba(196,155,111,0.12);
        }

        /* ── Alert error ── */
        .alert-custom {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(220,38,38,0.15);
            border: 1px solid rgba(220,38,38,0.35);
            border-radius: 12px;
            padding: 13px 15px;
            margin-bottom: 22px;
            color: #fca5a5;
            font-size: 14px;
        }
        .alert-custom i { font-size: 18px; color: #f87171; }

        /* ── Submit button ── */
        .btn-login {
            width: 100%;
            padding: 14px;
            margin-top: 8px;
            background: linear-gradient(135deg, var(--coffee-primary) 0%, var(--coffee-dark) 100%);
            border: none;
            border-radius: 12px;
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.4px;
            cursor: pointer;
            transition: opacity .2s, transform .15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover  { opacity: .88; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }

        /* ── Demo credential hint ── */
        .demo-cred {
            margin-top: 22px;
            padding: 12px 14px;
            background: rgba(196,155,111,0.08);
            border: 1px solid rgba(196,155,111,0.18);
            border-radius: 10px;
            text-align: center;
            font-size: 12px;
            color: rgba(245,236,224,0.4);
            line-height: 1.6;
        }
        .demo-cred span { color: var(--coffee-primary); font-weight: 600; }

        /* ── Footer link ── */
        .footer-links {
            text-align: center;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid rgba(196,155,111,0.12);
        }
        .footer-links a {
            color: rgba(196,155,111,0.7);
            text-decoration: none;
            font-size: 13px;
            transition: color .2s;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .footer-links a:hover { color: var(--coffee-primary); }
        .footer-links p {
            color: rgba(245,236,224,0.2);
            font-size: 11px;
            margin-top: 10px;
        }

        /* ── Copyright ── */
        .login-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 11px;
            color: rgba(245,236,224,0.18);
        }

        /* ── Responsive ── */
        @media (max-width: 480px) {
            .login-card { padding: 28px 22px; }
            .login-brand h1 { font-size: 34px; }
            .btn-login { font-size: 14px; padding: 12px; }
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    <!-- Brand -->
    <div class="login-brand">
        <div class="brand-icon-box">
            <!-- Ikon MANGKOK dari FontAwesome (GANTI dari ion-md-cafe) -->
            <i class="fas fa-bowl-food"></i>
        </div>
        <h1>Vermata</h1>
        <p>Welcome to Vermata Burjo Family</p>
    </div>

    <!-- Card -->
    <div class="login-card">
        <h2>Welcome back</h2>
        <p class="login-sub">Sign in to your account to continue</p>

        <?= $this->renderSection('content') ?>

        <div class="demo-cred">
            💡 Demo: <span>eka88</span> / <span>1234567</span>
        </div>
    </div>

    <p class="login-footer">© <?= date('Y') ?> Valentio Titan · All rights reserved</p>
</div>

<!-- Scripts -->
<script src="<?= base_url('coffee1-1.0.0/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('coffee1-1.0.0/js/popper.min.js') ?>"></script>
<script src="<?= base_url('coffee1-1.0.0/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('coffee1-1.0.0/js/main.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('.form-control-custom').on('focus', function() {
            $(this).parent('.input-group-custom').addClass('focused');
        }).on('blur', function() {
            $(this).parent('.input-group-custom').removeClass('focused');
        });
    });
</script>

</body>
</html>