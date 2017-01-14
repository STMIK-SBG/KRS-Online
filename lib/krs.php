<?php
class Krs{

    // Koneksi database dan nama table
    private $conn;
    private $table_name = "krs";
    private $base_url;

    public function __construct($db, $url)
    {
        $this->conn = $db;
        $this->base_url = $url;
    }

    function getAllBySemester($semester, $jurusan)
    {
      $query = "SELECT
                 jurusan.nama_jurusan,
                 matakuliah.nama_matakuliah,
                 matakuliah.sks,
                 krs.semester,
                 krs.id
              FROM " . $this->table_name . "
              INNER JOIN jurusan ON jurusan.id = krs.id_jurusan
              INNER JOIN matakuliah ON matakuliah.id = krs.id_matakuliah
              WHERE
                  krs.semester=" . $semester . "
              AND
                  krs.id_jurusan=" . $jurusan . "
              ORDER BY matakuliah.nama_matakuliah
              ";

      $do = $this->conn->prepare( $query );
      $do->execute();
      return $do;
    }
    function addKrs($matakuliah, $semester, $jurusan)
    {
      $query = "INSERT INTO " . $this->table_name . " VALUES('','".$semester."','".$jurusan."','".$matakuliah."')";
      $do = $this->conn->prepare( $query );
      $do->execute();
    }
    function redirect($url = null, $permanent = false)
    {
      header('Location: ' . $this->base_url . $url, true, $permanent ? 301 : 302);
      exit();
    }
}
