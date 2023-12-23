<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'dbsks';

// Membuat koneksi ke MySQL
$conn = mysqli_connect($host, $user, $password);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memilih database
$db_select = mysqli_select_db($conn, $database);

if (!$db_select) {
    die("Pemilihan database gagal: " . mysqli_error($conn));
}
?>
