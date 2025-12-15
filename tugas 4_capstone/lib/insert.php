<?php
include 'connection.php';

// Anggap form menggunakan method="POST"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dari inputan form
    $nama    = $_POST['nama_lengkap'];
    $hp      = $_POST['no_handphone'];
    $wisata  = $_POST['tempat_wisata'];
    $tanggal = $_POST['tanggal_kunjungan'];
    $jumlah  = $_POST['jumlah_pengunjung'];
    $total   = $_POST['total_bayar']; 
    // Status default biasanya 'Pending'
    $status  = 'Pending';

    $query = "INSERT INTO pemesanan_tiket (nama_lengkap, no_handphone, tempat_wisata, tanggal_kunjungan, jumlah_pengunjung, total_bayar, status_pembayaran) 
              VALUES ('$nama', '$hp', '$wisata', '$tanggal', '$jumlah', '$total', '$status')";

    if (mysqli_query($conn, $query)) {
        // Jika sukses, balik ke halaman pemesanan
        header("Location: ../index.php?page=pemesanan");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>