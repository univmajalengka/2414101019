<?php
include "connection.php";

if (isset($_GET["id"])) {
    // Ambil ID dari URL
    $id = $_GET["id"];

    // Tangkap data dari POST
    $nama = $_POST['name'];
    $noHP = $_POST['noHP'];
    $tempat = $_POST['tempat'];
    $tanggal = $_POST['tgl'];
    $pengunjung = $_POST['pengunjung'];
    $hargaTiket = $_POST['hargaTiket'];
    $totalBayar = $_POST['totalBayar'];

    // Gunakan prepared statement
    $sql = "UPDATE pemesanan_tiket 
            SET nama_lengkap = ?, 
                no_handphone = ?, 
                tempat_wisata = ?, 
                tanggal_kunjungan = ?, 
                jumlah_pengunjung = ?, 
                harga_tiket = ?, 
                total_bayar = ? 
            WHERE id = ?";

    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssi",
        $nama,
        $noHP,
        $tempat,
        $tanggal,
        $pengunjung,
        $hargaTiket,
        $totalBayar,
        $id
    );

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        // Redirect dengan pesan sukses
        header("Location: ../index.php?route=pemesanan&pesan=berhasil_update");
        exit();
    } else {
        // Tampilkan error
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}

// Tutup koneksi
mysqli_close($conn);
