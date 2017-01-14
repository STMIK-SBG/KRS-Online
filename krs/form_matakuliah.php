<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}
if($_SESSION['login_level'] != 'admin'){
  $user->redirect('index.php');
}
$page_title = 'Tambah Jurusan';
include_once '../temp/header.php';
include_once '../temp/admin_nav.php'; ?>
<div class="container">
<?php
if(isset($_POST['save'])&&isset($_POST['nama_matakuliah'])&&$_POST['nama_matakuliah']!=''){
  $matakuliah->addMatakuliah($_POST['nama_matakuliah']);
}
?>
<form class="card card-block" method="post">
  <h4 class="card-title">Tambah Mata Perkuliahan</h4>
  <hr>
<div class="form-group row">
  <label for="example-text-input" class="col-md-2 col-form-label text-md-right">Mata Kuliah</label>
  <div class="col-md-4">
    <input class="form-control" type="text" id="example-text-input" name="nama_matakuliah">
  </div>
  <label for="example-text-input" class="col-md-2 col-form-label text-md-right">Jumlah SKS</label>
  <div class="col-md-1">
    <input class="form-control" type="text" id="example-text-input" name="sks" placeholder="0">
  </div>
  <input type="submit" class="btn btn-primary col-md-2" name="save" value="Simpan">
</div>
</form>
<table class="table table-bordered">
  <thead class="thead-default">
    <tr>
      <th>#</th>
      <th>Mata Kuliah</th>
      <th>SKS</th>
    </tr>
  </thead>
  <tbody>
<?php
$getAll = $matakuliah->getAll();
while ($row = $getAll->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  print('<tr>');
  print('<td>'.$id.'</td>');
  print('<td>'.$nama_matakuliah.'</td>');
  print('<td>'.$sks.'</td>');
  print('</tr>');
}
?>
</tbody>
</table>
</div>
<?php include_once '../temp/footer.php'; ?>
