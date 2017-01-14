<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}
if($_SESSION['login_level'] != 'admin' && $_SESSION['login_level'] != 'dosen'){
  $user->redirect('index.php');
}
$page_title = 'Tambah KRS';
include_once '../temp/header.php';
include_once '../temp/admin_nav.php'; ?>
<div class="container">
<?php
if(isset($_POST['save'])&&isset($_POST['matakuliah'])&&isset($_POST['semester'])&&isset($_POST['jurusan'])&&$_POST['matakuliah']!=''&&$_POST['semester']!=''&&$_POST['jurusan']!=''){
  $krs->addKrs($_POST['matakuliah'],$_POST['semester'],$_POST['jurusan']);
}
?>
<form class="card card-block" method="post">
  <h4 class="card-title">Tambah KRS</h4>
  <hr>
<div class="form-group row">
    <label for="matakuliah" class="col-md-2 col-form-label text-md-right">Mata Kuliah</label>
    <div class="col-md-7">
      <select class="form-control" id="matakuliah" name="matakuliah">
        <option value="">Pilih Mata Kuliah</option>
        <?php
          $getMatakuliah = $matakuliah->getAll();
          while ($rowMatakuliah = $getMatakuliah->fetch(PDO::FETCH_ASSOC)) {
            extract($rowMatakuliah); ?>
            <option value="<?= $id; ?>"><?= $nama_matakuliah; ?></option>
          <?php }
        ?>
      </select>
    </div>
  </div>
<div class="form-group row">
    <label for="semester" class="col-md-2 col-form-label text-md-right">Semester</label>
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
      <label for="jurusan" class="col-md-2 col-form-label text-md-right">Jurusan</label>
      <div class="col-md-7">
        <select class="form-control" id="jurusan" name="jurusan">
          <option value="">Pilih Jurusan</option>
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
  <input type="submit" name="save" value="Simpan" class="form-group btn btn-primary col-md-2 offset-md-2">
</form>
<?php for ($i=1; $i <= 8; $i++) { ?>
  <h1 class="display-4">Semester <?= $i; ?></h1>
  <table class="table table-bordered">
    <thead class="thead-default">
      <tr>
        <th>#</th>
        <th>Nama Jurusan</th>
        <th>Mata kuliah</th>
        <th>SKS</th>
      </tr>
    </thead>
    <tbody>
  <?php
  $count = $jurusan->getAll();
  for ($j=1; $j <= $count->rowCount(); $j++) {
  $getAll = $krs->getAllBySemester($i,$j);
  while ($row = $getAll->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    print('<tr>');
    print('<td>'.$id.'</td>');
    print('<td>'.$nama_jurusan.'</td>');
    print('<td>'.$nama_matakuliah.'</td>');
    print('<td>'.$sks.'</td>');
    print('</tr>');
  }
  }
  ?>
  </tbody>
  </table>
<?php } ?>
</div>
<?php include_once '../temp/footer.php'; ?>
