<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function validateInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    // Validasi dan Sanitasi Input
    $nama = validateInput($_POST['name']);
    $noHP = validateInput($_POST['noHP']);
    $tempat = validateInput($_POST['tempat']);
    $tanggal = validateInput($_POST['tgl']);
    $pengunjung = intval($_POST['pengunjung']);
    $hargaTiket = floatval($_POST['hargaTiket']);
    $totalBayar = floatval($_POST['totalBayar']);

    // Prepared Statement
    $query = "INSERT INTO pemesanan_tiket (
        nama_lengkap, 
        no_handphone, 
        tempat_wisata, 
        tanggal_kunjungan, 
        jumlah_pengunjung, 
        harga_tiket, 
        total_bayar
    ) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter
    mysqli_stmt_bind_param(
        $stmt,
        "ssssidd",
        $nama,
        $noHP,
        $tempat,
        $tanggal,
        $pengunjung,
        $hargaTiket,
        $totalBayar
    );

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php");
    } else {
        echo "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
