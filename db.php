<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "portodb";

// Membuat koneksi ke database
$conn = mysqli_connect($host, $username, $password, $database);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>