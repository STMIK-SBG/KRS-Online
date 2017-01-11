<?php
if(isset($_POST['install'])){
  session_start();
  session_destroy();
  if(file_exists('lib/site.php')){
    unlink('lib/site.php');
  }
  $fh = fopen('lib/site.php', 'a');
  fwrite($fh, '<?php $base_url=\''.$_POST['base_url'].'\';');
  fwrite($fh, '$site_name=\''.$_POST['site_name'].'\';');
  fwrite($fh, 'include_once \'database.php\';');
  fwrite($fh, '$database = new Database();');
  fwrite($fh, '$database->host = \''.$_POST['db_host'].'\';');
  fwrite($fh, '$database->db_name = \''.$_POST['db_name'].'\';');
  fwrite($fh, '$database->username = \''.$_POST['db_user'].'\';');
  fwrite($fh, '$database->password = \''.$_POST['db_pass'].'\';');
  fclose($fh);
  $in = new mysqli($_POST['db_host'], $_POST['db_user'], $_POST['db_pass'], $_POST['db_name']);
  // Check connection
  if ($in->connect_error) {
      die("Connection failed: " . $in->connect_error);
  }
  $drop_user = "DROP TABLE users";
  $table_user = "CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `nomor_induk` int(11) NOT NULL,
    `nama` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `id_jurusan` int(11) DEFAULT NULL,
    `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
    `kontak` varchar(50) NOT NULL,
    `level` enum('mahasiswa','dosen','admin') NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  $ins_user = "INSERT INTO `users` (`id`, `nomor_induk`, `nama`, `password`, `id_jurusan`, `jenis_kelamin`, `kontak`, `level`) VALUES
  (1, 0, 'Web Master', '$2y$11$4FjnxLNgh.KDyqHf9Y9haecCE8KOKZeD.wBAoefP8BaRzCPIDuUrG', NULL, 'laki-laki', 'admin@admin.com', 'admin')";
  $prim_user = "ALTER TABLE `users`
    ADD PRIMARY KEY (`id`)";
  $ai_user = "ALTER TABLE `users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2";
  $in->query($drop_user);
  $in->query($table_user);
  $in->query($ins_user);
  $in->query($prim_user);
  $in->query($ai_user);
  $in->close();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Instalasi Sistem KRS Online</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style media="screen">
      div.container{ margin-top: 20px;}
    </style>
  </head>
  <body>
      <div class="container">
        <?php if(isset($_POST['install'])&&isset($_GET['doinstal'])&&$_GET['doinstal']=='success'): ?>
        <div class="card card-block row text-md-center">
          <h1 class="display-1">Instalasi Sukses!</h1>
          <span class="col-md-12">Untuk login default admin, silakan gunakan data di bawah ini:</span>
          <div class="col-md-12">&nbsp;</div>
          <div class="card card-block col-md-7 offset-md-2">
            <span class="col-md-12">Nomor Induk: 0</span>
            <span class="col-md-12">Password: admin</span>
          </div>
          <a class="col-md-7 offset-md-2 btn btn-lg btn-primary text-white" href="index.php">Lihat Situs</a>
        </div>
        <?php else: ?>
        <form class="card card-block" method="post" action="?doinstal=success">
          <div class="form-group row">
            <div class="col-sm-8 offset-sm-2">
              <h1 class="display-4 text-uppercase text-md-center text-sm-center text-xs-center">Instalasi Sistem KRS Online</h1>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputBaseUrl" class="col-sm-2 offset-sm-2 form-control-label text-md-right">Alamat Situs</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputBaseUrl" name="base_url" placeholder="Alamat Situs">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputSiteName" class="col-sm-2 offset-sm-2 form-control-label text-md-right">Nama Situs</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputSiteName" name="site_name" placeholder="Nama Situs">
            </div>
          </div>
          <hr class="col-sm-8 offset-sm-2"/>
          <div class="form-group row">
            <label for="inputDbHost" class="col-sm-2 offset-sm-2 form-control-label text-md-right">Host Database</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputDbHost" name="db_host" placeholder="Host Database">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDbName" class="col-sm-2 offset-sm-2 form-control-label text-md-right">Nama Database</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputDbName" name="db_name" placeholder="Nama Database">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDbUser" class="col-sm-2 offset-sm-2 form-control-label text-md-right">Username Database</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputDbUser" name="db_user" placeholder="Username Database">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDbPass" class="col-sm-2 offset-sm-2 form-control-label text-md-right">Password Database</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="inputDbPass" name="db_pass" placeholder="Password Database">
            </div>
          </div>
          <div class="form-group row">
            <div class="offset-sm-4 col-sm-10">
              <input type="submit" class="btn btn-lg btn-primary" name="install" value="Instal">
            </div>
          </div>
        </form>
      <?php endif; ?>
      </div>
    <script src="assets/js/jquery-3.1.1.min.js"></script>
    <script src="assets/js/tether.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
