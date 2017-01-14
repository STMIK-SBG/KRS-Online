<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}

// Judul page
$page_title = 'Lihat User';
include_once '../temp/header.php';
switch ($_SESSION['login_level']) {
  case 'admin':
    include_once '../temp/admin_nav.php';
    break;
  case 'dosen':
    include_once '../temp/dosen_nav.php';
    break;
  case 'mahasiswa':
    include_once '../temp/mahasiswa_nav.php';
    break;

  default:
  include_once '../temp/mahasiswa_nav.php';
    break;
} ?>
<div class="container">
      <h6 class="display-5">NAMA MAHASISWA SEMESTER (5 Misalna) ngambil di database eta ris 5 na</h6>
      <table class="table table-bordered table-inverse">
  <thead>
    <tr>
      <th>Nomer Induk</th>
      <th>Nama Lengkap</th>
      <th>Jenis Kelamin</th>
      <th>Kontak</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>UM990099</td>
      <td>3</td>
      <td>Kosong</td>
      <td>Delete | Edit </td>
    </tr>
    <tr>
      <th scope="row">1</th>
      <td colspan=2>Jumlah SKS</td>
      <td>3</td>
      <td>Kosong</td>
    </tr>
  </tbody>
</table>
    </div>
<?php include_once '../temp/footer.php'; ?>
