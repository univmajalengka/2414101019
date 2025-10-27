<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan Manohara</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-blue-950 via-blue-900 to-blue-800">

    <!-- Tampilan Tabel Data Pemesanan -->
    <div class="container mx-auto px-4 py-8 my-20">
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <!-- Header Card -->
            <div class="px-6 py-5 bg-white border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-slate-900">
                    Data Pemesanan Tiket Wisata
                </h2>
                <!-- Tombol Tambah, asumsikan link ke form -->
                <a href="index.php?route=form" class="py-2 px-5 text-white bg-blue-700 rounded-lg text-sm font-medium hover:bg-blue-800 transition-colors duration-300 shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 flex items-center gap-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Pesanan Baru
                </a>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No HP</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tempat Wisata</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Pengunjung</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total Bayar</th>
                            <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider" colspan="2">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        // Koneksi database
                        include 'lib/connection.php';

                        // Query untuk mengambil data
                        $query = "SELECT * FROM pemesanan_tiket ORDER BY created_at DESC"; // Ubah ke DESC agar data terbaru di atas
                        $result = mysqli_query($conn, $query);

                        // Cek apakah ada data
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Tentukan warna status
                                $statusColor = [
                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                    'Lunas' => 'bg-green-100 text-green-800',
                                    'Dibatalkan' => 'bg-red-100 text-red-800'
                                ];
                        ?>
                                <tr class="hover:bg-gray-50 transition duration-200 align-middle">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500"><?= $no++ ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900"><?= htmlspecialchars($row['nama_lengkap']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500"><?= htmlspecialchars($row['no_handphone']) ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                            <?= htmlspecialchars(ucwords(str_replace('_', ' ', $row['tempat_wisata']))) // Bikin lebih rapi ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                        <?= date('d M Y', strtotime($row['tanggal_kunjungan'])) ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500"><?= $row['jumlah_pengunjung'] ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap font-semibold text-blue-700">
                                        Rp. <?= number_format($row['total_bayar'], 0, ',', '.') ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Status Pembayaran -->
                                        <span class="px-3 py-1 rounded-full text-xs font-medium <?= $statusColor[$row['status_pembayaran']] ?>">
                                            <?= $row['status_pembayaran'] ?>
                                        </span>
                                    </td>
                                    <td class="px-2 py-4 whitespace-nowrap">
                                        <!-- Dropdown Ubah Status -->
                                        <select onchange="ubahStatus(<?= $row['id'] ?>, this.value)" class="form-select block w-full px-2 py-1 border border-gray-300 rounded-md shadow-sm text-sm focus:border-green-500 focus:ring-green-500 transition duration-150 ease-in-out">
                                            <option value="Pending" <?= $row['status_pembayaran'] == 'Pending' ? 'selected' : '' ?>>
                                                Pending
                                            </option>
                                            <option value="Lunas" <?= $row['status_pembayaran'] == 'Lunas' ? 'selected' : '' ?>>
                                                Lunas
                                            </option>
                                            <option value="Dibatalkan" <?= $row['status_pembayaran'] == 'Dibatalkan' ? 'selected' : '' ?>>
                                                Dibatalkan
                                            </option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <!-- Tombol Aksi dengan SVG -->
                                            <a href="index.php?route=detail&id=<?= $row['id'] ?>" class="text-blue-600 hover:text-blue-800" title="Detail">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                </svg>
                                            </a>
                                            <a href="index.php?route=edit&id=<?= $row['id']  ?>" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                            <a href="lib/delete.php?id=<?= $row['id'] ?>" onclick="konfirmasiHapus(event); return false;" class="text-red-600 hover:text-red-800" title="Hapus">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12.576 0c.342.052.682.107 1.022.166m0 0l-1.022-.165m12.576 0l-1.022-.165M9.75 5.79V4.5a2.25 2.25 0 012.25-2.25h.09a2.25 2.25 0 012.25 2.25v1.29" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="10" class="px-6 py-10 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                                        </svg>
                                        <p class="text-lg font-medium">Tidak ada data pemesanan</p>
                                        <p class="text-sm">Saat ini belum ada data pemesanan yang masuk.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                <span class="text-sm text-gray-600">
                    Total Data: <strong><?= mysqli_num_rows($result) ?></strong> Pemesanan
                </span>
                <!-- Di sini bisa ditambahkan link pagination jika ada -->
            </div>
        </div>
    </div>

    <script>
        // Fungsi Ubah Status dengan SweetAlert
        function ubahStatus(id, status) {
            Swal.fire({
                title: 'Ubah Status Pembayaran?',
                text: `Anda yakin ingin mengubah status pesanan ini menjadi "${status}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#15803d', // green-700
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Sedang mengubah status, mohon tunggu...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Kirim request AJAX (sama seperti kode asli Anda)
                    fetch("lib/ubah_status.php", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/x-www-form-urlencoded",
                            },
                            body: `id=${id}&status=${status}`,
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Status telah berhasil diubah.',
                                    icon: 'success',
                                    confirmButtonColor: '#15803d'
                                }).then(() => {
                                    location.reload(); // Refresh halaman
                                });
                            } else {
                                Swal.fire({
                                    title: 'Gagal!',
                                    text: 'Gagal mengubah status: ' + data.message,
                                    icon: 'error',
                                    confirmButtonColor: '#15803d'
                                });
                            }
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Terjadi kesalahan saat mengubah status.',
                                icon: 'error',
                                confirmButtonColor: '#15803d'
                            });
                        });
                }
            });
        }

        // Fungsi Konfirmasi Hapus dengan SweetAlert
        function konfirmasiHapus(event) {
            event.preventDefault(); // Hentikan link agar tidak langsung jalan
            const deleteUrl = event.currentTarget.href; // Ambil URL hapus dari link

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen dan tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus data!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, lanjutkan ke URL hapus
                    window.location.href = deleteUrl;
                }
            });
            return false;
        }
    </script>

</body>

</html>
