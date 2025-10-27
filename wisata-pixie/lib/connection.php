<?php
// File: koneksi.php
$host = "localhost";     // Hostname database
$username = "tugaspabw_2414101019";      // Username database
$password = "Majalengka.30";          // Password database
$database = "tugaspabw_2414101019"; // Nama database Anda

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
