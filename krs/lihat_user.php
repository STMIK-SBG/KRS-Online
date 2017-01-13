<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}
if($_SESSION['login_level'] != 'mahasiswa'){
  $user->redirect('index.php');
}

// Judul page
$page_title = 'Mahasiswa';
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
