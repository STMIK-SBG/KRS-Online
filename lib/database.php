<?php
class Database{

    // Pengaturan untuk koneksi ke database
    public $host = "localhost";
    public $db_name = "krs_online";
    public $username = "root";
    public $password = "";
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
