<?php
include "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM pemesanan_tiket WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman daftar pemesanan setelah sukses menghapus
        header("Location: ../index.php?route=pemesan");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan";
}

mysqli_close($conn);
