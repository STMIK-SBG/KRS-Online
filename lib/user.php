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
