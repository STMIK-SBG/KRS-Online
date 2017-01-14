<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}
if($_SESSION['login_level'] != 'admin'){
  $user->redirect('index.php');
}
$page_title = 'Tambah Mahasiswa';
include_once '../temp/header.php';
include_once '../temp/admin_nav.php'; ?>
<div class="container">
<form class="card card-block">
<div class="form-group row">
  <label for="example-text-input" class="col-md-2 col-form-label text-md-right">Nomor Induk</label>
  <div class="col-md-7">
    <input class="form-control" type="text" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-md-2 col-form-label text-md-right">Nama Mahasiswa</label>
  <div class="col-md-7">
    <input class="form-control" type="text" id="example-text-input">
  </div>
</div>
<div class="form-group row">
    <label for="semester" class="col-md-2 col-form-label text-md-right">Semester</label>
    <div class="col-md-7">
      <select class="form-control" id="semester">
        <option>Pilih Semester</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label for="semester" class="col-md-2 col-form-label text-md-right">Jurusan</label>
      <div class="col-md-7">
        <select class="form-control" id="semester">
          <option>Pilih Jurusan</option>
          <option>Teknik Informatika</option>
          <option>Manajemen Informatika</option>
          <option>Akuntansi</option>
        </select>
      </div>
    </div>
    <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-2 text-md-right">Jenis Kelamin</legend>
      <div class="col-sm-7">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="laki-laki" checked>
            Laki-Laki
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="perempuan">
            Perempuan
          </label>
        </div>
      </div>
    </fieldset>
    <input type="submit" class="form-group btn btn-primary col-md-2 offset-md-2" name="save" value="Simpan">
</form>
<?php include_once '../temp/footer.php'; ?>
