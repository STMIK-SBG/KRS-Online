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
if(isset($_POST['save'])&&isset($_POST['nama_jurusan'])&&$_POST['nama_jurusan']!=''){
  $jurusan->addJurusan($_POST['nama_jurusan']);
}
?>
<form class="card card-block" method="post">
  <h4 class="card-title">Tambah Jurusan</h4>
  <hr>
<div class="form-group row">
  <label for="example-text-input" class="col-md-2 col-form-label text-md-right">Nama Jurusan</label>
  <div class="col-md-7">
    <input class="form-control" type="text" id="example-text-input" name="nama_jurusan">
  </div>
  <input type="submit" class="btn btn-primary col-md-2" name="save" value="Simpan">
</div>
</form>
<table class="table table-bordered">
  <thead class="thead-default">
    <tr>
      <th>#</th>
      <th>Nama Jurusan</th>
    </tr>
  </thead>
  <tbody>
<?php
$getAll = $jurusan->getAll();
while ($row = $getAll->fetch(PDO::FETCH_ASSOC)) {
  extract($row);
  print('<tr>');
  print('<td>'.$id.'</td>');
  print('<td>'.$nama_jurusan.'</td>');
  print('</tr>');
}
?>
</tbody>
</table>
</div>
<?php include_once '../temp/footer.php'; ?>
