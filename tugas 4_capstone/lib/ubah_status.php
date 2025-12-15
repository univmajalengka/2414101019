<?php
// Matikan semua output error PHP biar tidak merusak format JSON
error_reporting(0);
ini_set('display_errors', 0);

header('Content-Type: application/json');

// --- 1. KONEKSI DATABASE (HARDCODE) ---
// Kita tulis langsung di sini biar 100% yakin nyambung
$host = "localhost";
$user = "root";
$pass = "";
$db   = "pixiee"; // Pastikan nama database sesuai screenshot kamu: 'pixiee'

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek Koneksi
if (!$conn) {
    echo json_encode([
        'success' => false, 
        'message' => 'Koneksi Database Gagal: ' . mysqli_connect_error()
    ]);
    exit;
}

// --- 2. AMBIL DATA ---
$id     = $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

// Cek Data Kosong
if (empty($id) || empty($status)) {
    echo json_encode([
        'success' => false, 
        'message' => "Data tidak lengkap! (ID: '$id', Status: '$status')"
    ]);
    exit;
}

// Bersihkan Input
$id     = mysqli_real_escape_string($conn, $id);
$status = mysqli_real_escape_string($conn, $status);

// --- 3. JALANKAN QUERY ---
$query = "UPDATE pemesanan_tiket SET status_pembayaran = '$status' WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    // Kirim pesan error asli dari MySQL
    echo json_encode([
        'success' => false, 
        'message' => 'Error MySQL: ' . mysqli_error($conn)
    ]);
}
?>