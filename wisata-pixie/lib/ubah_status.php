<?php
// Include koneksi database
include 'connection.php';

// Tangkap data dari request
$id = $_POST['id'] ?? null;
$status = $_POST['status'] ?? null;

// Validasi input
$response = ['success' => false, 'message' => ''];

if ($id && $status) {
    // Prepared statement untuk keamanan
    $query = "UPDATE pemesanan_tiket SET status_pembayaran = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "si", $status, $id);

    if (mysqli_stmt_execute($stmt)) {
        $response['success'] = true;
        $response['message'] = 'Status berhasil diubah';
    } else {
        $response['message'] = 'Gagal mengubah status: ' . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    $response['message'] = 'Parameter tidak valid';
}

// Kirim response JSON
header('Content-Type: application/json');
echo json_encode($response);

// Tutup koneksi
mysqli_close($conn);
