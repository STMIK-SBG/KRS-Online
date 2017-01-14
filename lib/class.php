<?php
session_start();
include_once 'site.php';
// include_once 'database.php';
include_once 'user.php';
include_once 'jurusan.php';
include_once 'krs.php';
include_once 'matakuliah.php';

// Koneksi database
// $database = new Database();
$db = $database->getConnection();

// Initial database ke class
$user = new User($db, $base_url);
$jurusan = new Jurusan($db, $base_url);
$krs = new Krs($db, $base_url);
$matakuliah = new Matakuliah($db, $base_url);
