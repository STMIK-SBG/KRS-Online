<?php
session_start();
include_once 'site.php';
include_once 'database.php';
include_once 'user.php';

// Koneksi database
$database = new Database();
$db = $database->getConnection();

// Initial database ke class
$user = new User($db, $base_url);
