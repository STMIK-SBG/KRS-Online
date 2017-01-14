<?php
// include class
include_once '../lib/class.php';
if(!isset($_SESSION['login_user'])&&!isset($_SESSION['login_pass'])&&!isset($_SESSION['login_level'])){
  $user->redirect('index.php');
}
if($_SESSION['login_level'] != 'dosen'){
  $user->redirect('index.php');
}

// Judul page
$page_title = 'Dosen';
include_once '../temp/header.php';
include_once '../temp/dosen_nav.php'; ?>
    <div class="container">
      <h1 class="display-1">DOSEN</h1>
    </div>
<?php include_once '../temp/footer.php'; ?>
