<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_portfolio";

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>