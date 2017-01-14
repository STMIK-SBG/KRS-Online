<?php
class User{

    // Koneksi database dan nama table
    private $conn;
    private $table_name = "users";
    private $base_url;

    public function __construct($db, $url)
    {
        $this->conn = $db;
        $this->base_url = $url;
    }

    function getAll()
    {
      $query = "SELECT
                 users.*,
                 jurusan.nama_jurusan
              FROM " . $this->table_name . "
              INNER JOIN jurusan ON jurusan.id = users.id_jurusan
              ORDER BY id
              ";

      $do = $this->conn->prepare( $query );
      $do->execute();
      return $do;
    }

    function getCurrentUserIdJurusan()
    {
      $query = "SELECT
                 users.*,
                 jurusan.nama_jurusan
              FROM " . $this->table_name . "
              INNER JOIN jurusan ON jurusan.id = users.id_jurusan
              WHERE nomor_induk=" . $_SESSION['login_user'] . "
              ORDER BY id
              ";

      $do = $this->conn->prepare( $query );
      $do->execute();

      $user = $do;
      while($row = $user->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        if($nomor_induk===$_SESSION['login_user']){
          return $id_jurusan;
        }
      }
      return 1;
    }

    function addUser($nid,$nama,$kontak,$semester,$jurusan,$jabatan,$jenis_kelamin,$password)
    {
      $options = [
          'cost' => 11,
      ];

      $hash = password_hash($password, PASSWORD_BCRYPT, $options);
      $query = "INSERT INTO " . $this->table_name . " VALUES('','".$nid."','".$nama."','".$hash."','".$jurusan."','".$semester."','".$jenis_kelamin."','".$kontak."','".$jabatan."')";
      $do = $this->conn->prepare( $query );
      $do->execute();
    }

    // Ambil semua user dari database
    function verifyLogin($nid, $pass)
    {
        $query = "SELECT
                    *
                FROM
                    " . $this->table_name . "
                WHERE
                    nomor_induk=" . $nid . "
                LIMIT 1";

        $do = $this->conn->prepare( $query );
        $do->execute();

        $user = $do;
        while ($row = $user->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
          if($nomor_induk === $nid && password_verify($pass, $password)){
            return $level;
          }
        }
        return false;
    }

    function doLogin($nid, $pass)
    {
      $_SESSION['login_user'] = $nid;
      $_SESSION['login_pass'] = $pass;
      switch ($this->verifyLogin($nid, $pass)) {
        case 'admin':
          $_SESSION['login_level'] = 'admin';
          $this->redirect('krs/admin.php');
          break;
        case 'dosen':
          $_SESSION['login_level'] = 'dosen';
          $this->redirect('krs/dosen.php');
          break;
        case 'mahasiswa':
          $_SESSION['login_level'] = 'mahasiswa';
          $this->redirect('krs/mahasiswa.php');
          break;

        default:
          $this->redirect();
          break;
      }
    }

    function redirect($url = null, $permanent = false)
    {
      header('Location: ' . $this->base_url . $url, true, $permanent ? 301 : 302);
      exit();
    }

    function doLogout()
    {
      session_destroy();
      $this->redirect();
    }
}
