<?php
class Jurusan{

    // Koneksi database dan nama table
    private $conn;
    private $table_name = "jurusan";
    private $base_url;

    public function __construct($db, $url)
    {
        $this->conn = $db;
        $this->base_url = $url;
    }

    function getAll()
    {
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name;

      $do = $this->conn->prepare( $query );
      $do->execute();
      return $do;
    }

    function addJurusan($jurusan)
    {
      $query = "INSERT INTO " . $this->table_name . " VALUES('','".$jurusan."')";
      $do = $this->conn->prepare( $query );
      $do->execute();
    }

    function redirect($url = null, $permanent = false)
    {
      header('Location: ' . $this->base_url . $url, true, $permanent ? 301 : 302);
      exit();
    }
}
