<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pixiee"; // <--- SAYA UBAH JADI 'pixiee' SESUAI SCREENSHOT

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi Gagal: " . mysqli_connect_error());
}
?>