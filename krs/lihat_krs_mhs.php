<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}

// Judul page
$page_title = 'Lihat KRS';
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
      <?php for ($i=1; $i <= 8; $i++) {
      $totalSKS = 0; ?>
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
        $getAll = $krs->getAllBySemester($i,$user->getCurrentUserIdJurusan());
        while ($row = $getAll->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
          print('<tr>');
          print('<td>'.$id.'</td>');
          print('<td>'.$nama_jurusan.'</td>');
          print('<td>'.$nama_matakuliah.'</td>');
          print('<td>'.$sks.'</td>');
          print('</tr>');
          $totalSKS += $sks;
        }
        ?>
        <tr>
          <th colspan="3">Total SKS</th>
          <td><?= $totalSKS; ?></td>
        </tr>
        </tbody>
        </table>
      <?php } ?>
    </div>
<?php include_once '../temp/footer.php'; ?>
