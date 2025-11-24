<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'home':
            include 'main/home.php';
            break;
            
        case 'pemesanan':
            // Sesuai nama file di gambar kamu: 'pemesan.php'
            if(file_exists('main/pemesan.php')) {
                include 'main/pemesan.php';
            } else {
                echo "File main/pemesan.php tidak ditemukan!";
            }
            break;

        case 'tambah_pesanan':
            // Sesuai nama file di gambar: 'form.php'
            include 'main/form.php';
            break;

        case 'edit':
            // Sesuai nama file di gambar: 'edit-form.php'
            include 'main/edit-form.php';
            break;
            
        case 'detail':
            // Sesuai nama file di gambar: 'detail.php'
            include 'main/detail.php';
            break;

        default:
            include 'main/home.php'; // Halaman default jika page tidak dikenali
            break;
    }
} else {
    // Jika tidak ada ?page=... buka home sebagai default
    include 'main/home.php';
}
?>