<?php
// Aktifkan error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Bersihkan ID
    $id = mysqli_real_escape_string($conn, $id);

    $query = "DELETE FROM pemesanan_tiket WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        // Redirect kembali ke halaman tabel
        header("Location: ../index.php?page=pemesanan");
        exit;
    } else {
        echo "Gagal menghapus: " . mysqli_error($conn);
    }
} else {
    header("Location: ../index.php?page=pemesanan");
}
?>