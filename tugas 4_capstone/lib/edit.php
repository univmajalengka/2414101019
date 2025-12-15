<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id      = $_POST['id']; // Pastikan di form edit ada <input type="hidden" name="id">
    $nama    = $_POST['nama_lengkap'];
    $hp      = $_POST['no_handphone'];
    $wisata  = $_POST['tempat_wisata'];
    $tanggal = $_POST['tanggal_kunjungan'];
    $jumlah  = $_POST['jumlah_Tiket'];
    $total   = $_POST['total_bayar'];
    
    // Update data
    $query = "UPDATE pemesanan_tiket SET 
              nama_lengkap='$nama', 
              no_handphone='$hp', 
              tempat_wisata='$wisata', 
              tanggal_kunjungan='$tanggal', 
              jumlah_pengunjung='$jumlah', 
              total_bayar='$total' 
              WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?page=pemesanan");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>