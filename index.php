<?php
// include class
include_once 'lib/class.php';
if(isset($_SESSION['login_user']) && isset($_SESSION['login_pass'])){
  $user->doLogin($_SESSION['login_user'], $_SESSION['login_pass']);
}else{
  if(isset($_POST['nomor_induk']) && isset($_POST['password'])){
  $options = [
      'cost' => 11,
  ];
  $user->doLogin($_POST['nomor_induk'], $_POST['password']);
  }
}
// Judul page
$page_title = 'Masuk';
include_once 'temp/header.php'; ?>
    <div class="container">
      <form class="card card-block" method="post">
        <div class="form-group row">
          <div class="col-sm-8 offset-sm-2">
            <h1 class="display-4 text-uppercase text-md-center text-sm-center text-xs-center"><?= $site_name; ?></h1>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputNomorInduk" class="col-sm-2 offset-sm-2 form-control-label">Nomor Induk</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputNomorInduk" name="nomor_induk" placeholder="Nomor Induk">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 offset-sm-2 form-control-label">Password</label>
          <div class="col-sm-6">
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
          </div>
        </div>
        <div class="form-group row">
          <div class="offset-sm-4 col-sm-10">
            <button type="submit" class="btn btn-lg btn-primary">Masuk</button>
          </div>
        </div>
      </form>
    </div>
<?php include_once 'temp/footer.php'; ?>
