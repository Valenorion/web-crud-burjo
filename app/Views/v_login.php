<?= $this->extend('layout_clear') ?>
<?= $this->section('content') ?>

<?php
$username = [
    'name'      => 'username',
    'id'        => 'username',
    'class'     => 'form-control-custom',
    'placeholder' => 'Enter your username',
    'value'     => set_value('username'),
    'required'  => true,
    'minlength' => 3
];

$password = [
    'name'      => 'password',
    'id'        => 'password',
    'class'     => 'form-control-custom',
    'placeholder' => 'Enter your password',
    'required'  => true,
    'minlength' => 7
];
?>

<!-- Error flash message -->
<?php if (session()->getFlashData('failed')): ?>
<div class="alert-custom">
    <i class="icon ion-md-alert"></i>
    <?= session()->getFlashData('failed') ?>
</div>
<?php endif; ?>

<!-- Login form -->
<?= form_open('login', ['class' => 'login-form']) ?>

<div class="form-group">
    <label for="username">
        <i class="icon ion-md-person"></i>Username
    </label>
    <div class="input-group-custom">
        <span class="input-icon">
            <i class="icon ion-md-person"></i>
        </span>
        <?= form_input($username) ?>
    </div>
</div>

<div class="form-group">
    <label for="password">
        <i class="icon ion-md-lock"></i>Password
    </label>
    <div class="input-group-custom">
        <span class="input-icon">
            <i class="icon ion-md-lock"></i>
        </span>
        <?= form_password($password) ?>
    </div>
</div>

<button type="submit" class="btn-login">
    <i class="icon ion-md-log-in"></i> Login
</button>

<div class="footer-links">
    <a href="<?= base_url('/') ?>">← Back to Home</a>
</div>

<?= form_close() ?>

<?= $this->endSection() ?>