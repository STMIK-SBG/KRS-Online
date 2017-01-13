<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}
if($_SESSION['login_level'] != 'admin'){
  $user->redirect('index.php');
}
$page_title = 'Admin';
include_once '../temp/header.php'; ?>
<header class="navbar navbar-dark navbar-sticky-top bg-primary">
    <nav>
      <div class="clearfix">
        <button class="navbar-toggler float-xs-right hidden-sm-up collapsed" type="button" data-toggle="collapse" data-target="#bd-main-nav" aria-controls="bd-main-nav" aria-expanded="false" aria-label="Toggle navigation"></button>
        <a class="navbar-brand hidden-sm-up" href="<?= $base_url; ?>">KRS Online</a>
      </div>
      <div class="navbar-toggleable-xs collapse" id="bd-main-nav" aria-expanded="false">
        <div class="navbar-header hidden-xs-down">
          <a class="nav-link navbar-brand" href="<?= $base_url; ?>">KRS Online</a>
        </div>
        <ul class="nav navbar-nav float-md-right">
          <li class="nav-item">
            <a class="nav-item nav-link" href="javascript:void(0)">Lihat KRS</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="javascript:void(0)">Cetak KRS</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="javascript:void(0)">Informasi Akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="javascript:void(0)">Panduan KRS Online</a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="<?= $base_url; ?>logout.php">Keluar</a>
          </li>
        </ul>
      </div>
    </nav>
</header>
<div class="container">
  <h1 class="display-1">Form User</h1>

<form>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nomor Induk</label>
  <div class="col-10">
    <input class="form-control" type="text" id="example-text-input">
  </div>
</div>


<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Nama Lengkap</label>
  <div class="col-10">
    <input class="form-control" type="text" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-2 col-form-label">Password</label>
  <div class="col-10">
    <input class="form-control" type="text" accesskey="*" id="example-text-input">
  </div>
</div>

<div class="form-group">
    <label for="exampleSelect1">Jenis Kelamin </label>
    <select class="form-control" id="exampleSelect1">
      <option>Laki - Laki</option>
      <option>Perempuan</option>

    </select>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-2 col-form-label">Kontak</label>
    <div class="col-10">
      <input class="form-control" type="text" id="example-text-input">
    </div>
  </div>
  <div class="form-group">
      <label for="exampleSelect1">Jenis Kelamin </label>
      <select class="form-control" id="exampleSelect1">
        <option>Laki - Laki</option>
        <option>Perempuan</option>

      </select>
    </div>
    <div class="form-group row">
      <label for="example-text-input" class="col-2 col-form-label">Kontak</label>
      <div class="col-10">
        <input class="form-control" type="text" id="example-text-input">
      </div>
    </div>
    <div class="form-group">
        <label for="exampleSelect1">Jenis Kelamin </label>
        <select class="form-control" id="exampleSelect1">
          <option>admin</option>
          <option>mahasiswa</option>

        </select>
      </div>
</form>
