<?php
include "lib/connection.php";

$id = $_GET['id'];
$query = "SELECT * FROM pemesanan_tiket WHERE id = $id";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>

<div>
    <div class="container mx-auto px-4 py-8 mt-16">
        <div class="bg-white shadow-md rounded-lg overflow-hidden max-w-2xl mx-auto">
            <div class="bg-green-800 text-white p-4">
                <h1 class="text-2xl font-bold">Detail Pemesanan Wisata</h1>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Informasi Pemesan</h2>
                        <div class="space-y-2">
                            <p><strong>Nama Lengkap:</strong> <?= $data['nama_lengkap'] ?></p>
                            <p><strong>Nomor Handphone:</strong> <?= $data['no_handphone'] ?></p>
                        </div>
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold mb-4">Detail Kunjungan</h2>
                        <div class="space-y-2">
                            <p><strong>Tempat Wisata:</strong> <?= $data['tempat_wisata'] ?></p>
                            <p><strong>Tanggal Kunjungan:</strong> <?= $data['tanggal_kunjungan'] ?></p>
                            <p><strong>Jumlah Pengunjung:</strong> <?= $data['jumlah_pengunjung'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold mb-4">Rincian Biaya</h2>
                    <table class="w-full border-collapse">
                        <tr class="border-b">
                            <td class="py-2">Harga Tiket per Orang</td>
                            <td class="text-right">Rp. <?= number_format($data['harga_tiket'], 0, ",", ".") ?></td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2">Jumlah Pengunjung</td>
                            <td class="text-right"><?= $data['jumlah_pengunjung'] ?> Orang</td>
                        </tr>
                        <tr class="font-bold">
                            <td class="py-2">Total Pembayaran</td>
                            <td class="text-right text-green-800">Rp. <?= number_format($data['total_bayar'], 0, ",", ".") ?></td>
                        </tr>
                    </table>
                </div>

                <div class="mt-6 flex justify-between">
                    <div>
                        <h3 class="font-semibold">Kode Booking</h3>
                        <p class="text-lg text-blue-600">[KODE BOOKING UNIK]</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 p-4 flex justify-between">
                <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded no-print">
                    Cetak Invoice
                </button>
                <button onclick="window.location.href='index.php?route=pemesan'" class="bg-green-800 text-white px-4 py-2 rounded no-print">
                    Kembali ke Beranda
                </button>
            </div>
        </div>
    </div>
</div>