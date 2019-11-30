<?php 

if ($this->session->userdata('username') == "") {
	$this->session->set_flashdata('msg', 'Anda harus login dahulu');
	redirect(base_url('auth'));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="<?= base_url('settings/index') ?>">Control Panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('/') ?>">Landing Page</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= base_url('settings/banner_setting') ?>">Banner Setting</a>
          <a class="dropdown-item" href="<?= base_url('settings/katalog_setting') ?>">Katalog Setting</a>
          <a class="dropdown-item" href="<?= base_url('settings/manfaat_setting') ?>">Manfaat Setting</a>
          <a class="dropdown-item" href="<?= base_url('settings/testimonial_setting') ?>">Testimonial Setting</a>
          <a class="dropdown-item" href="<?= base_url('settings/whatsapp_setting') ?>">Whatsapp Setting</a>
        </div>
      </li>
    </ul>
    <a href="<?= base_url('auth/logout') ?>" class="nav-link">Logout</a>
  </div>
</nav>

