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
<?php
if(isset($_POST['save'])&&isset($_POST['nid'])&&$_POST['nid']!=''){
  $user->addUser($_POST['nid'],$_POST['nama'],$_POST['kontak'],$_POST['semester'],$_POST['jurusan'],$_POST['jabatan'],$_POST['jenis_kelamin'],$_POST['password']);
}
?>
<form class="card card-block" method="post">
  <h4 class="card-title">Tambah Mahasiswa / Dosen</h4>
  <hr>
<div class="form-group row">
  <label for="example-text-input" class="col-md-3 col-form-label text-md-right">Nomor Induk</label>
  <div class="col-md-7">
    <input class="form-control" type="text" id="example-text-input" name="nid">
  </div>
</div>
<div class="form-group row">
<label for="example-text-input" class="col-md-3 col-form-label text-md-right">Password</label>
<div class="col-md-7">
  <input class="form-control" type="password" id="example-text-input" name="password">
</div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-md-3 col-form-label text-md-right">Nama Mahasiswa / Dosen</label>
  <div class="col-md-7">
    <input class="form-control" type="text" id="example-text-input" name="nama">
  </div>
</div>
<div class="form-group row">
  <label for="example-text-input" class="col-md-3 col-form-label text-md-right">Kontak</label>
  <div class="col-md-7">
    <input class="form-control" type="text" id="example-text-input" name="kontak">
  </div>
</div>
<div class="form-group row">
  <label for="semester" class="col-md-3 col-form-label text-md-right">Semester</label>
  <div class="col-md-7">
    <select class="form-control" id="semester" name="semester">
      <option value="">Pilih Semester</option>
      <?php for ($a=1; $a <= 8; $a++) { ?>
        <option value="<?= $a; ?>"><?= $a; ?></option>
      <?php } ?>
    </select>
  </div>
</div>
<div class="form-group row">
    <label for="jurusan" class="col-md-3 col-form-label text-md-right">Jurusan</label>
    <div class="col-md-7">
      <select class="form-control" id="jurusan" name="jurusan">
        <option value="0">Pilih Jurusan</option>
        <?php
          $getJurusan = $jurusan->getAll();
          while ($rowJurusan = $getJurusan->fetch(PDO::FETCH_ASSOC)) {
            extract($rowJurusan); ?>
            <option value="<?= $id; ?>"><?= $nama_jurusan; ?></option>
          <?php }
        ?>
      </select>
    </div>
  </div>
    <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-3 text-md-right">Jabatan</legend>
      <div class="col-sm-7">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="jabatan" id="gridRadios1" value="dosen" checked>
            Dosen
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="jabatan" id="gridRadios2" value="mahasiswa">
            Mahasiswa
          </label>
        </div>
      </div>
    </fieldset>
    <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-3 text-md-right">Jenis Kelamin</legend>
      <div class="col-sm-7">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios1" value="laki-laki" checked>
            Laki-Laki
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadios2" value="perempuan">
            Perempuan
          </label>
        </div>
      </div>
    </fieldset>
    <input type="submit" class="form-group btn btn-primary col-md-2 offset-md-3" name="save" value="Simpan">
</form>
<table class="table table-bordered">
  <thead class="thead-default">
    <tr>
      <th>#</th>
      <th>Nomor Induk</th>
      <th>Nama</th>
      <th>Jurusan</th>
      <th>Semester</th>
      <th>Jenis Kelamin</th>
      <th>Kontak</th>
      <th>Jabatan</th>
    </tr>
  </thead>
  <tbody>
<?php
$getAll = $user->getAll();
while ($row = $getAll->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  print('<tr>');
  print('<td>'.$id.'</td>');
  print('<td>'.$nomor_induk.'</td>');
  print('<td>'.$nama.'</td>');
  print('<td>'.$nama_jurusan.'</td>');
  print('<td>'.$semester.'</td>');
  print('<td>'.$jenis_kelamin.'</td>');
  print('<td>'.$kontak.'</td>');
  print('<td>'.$level.'</td>');
  print('</tr>');
}
?>
</tbody>
</table>
</div>
<?php include_once '../temp/footer.php'; ?>
