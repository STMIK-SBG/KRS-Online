<?php
class Database{

    // Pengaturan untuk koneksi ke database
    private $host = "localhost";
    private $db_name = "krs_online";
    private $username = "root";
    private $password = "";
    public $conn;

    // Koneksi ke database
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Koneksi ke database Error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
