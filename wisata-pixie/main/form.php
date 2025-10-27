<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manohara | Form Pemesanan</title>
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

    <div class="min-h-screen w-full flex items-center justify-center p-4 md:p-8">
        
        <!-- Kartu Form -->
        <div class="w-full max-w-2xl bg-white rounded-2xl shadow-2xl overflow-hidden my-10">
            
            <!-- Header Kartu -->
            <div class="p-8 bg-gray-50 border-b border-gray-200">
                <h1 class="text-3xl font-bold text-slate-900 mb-1">Formulir Pemesanan</h1>
                <p class="text-gray-600">Silakan isi detail perjalanan Anda di bawah ini.</p>
            </div>

            <!-- Form Body -->
            <form method="post" action="../lib/insert.php" class="p-8">
                <div class="space-y-6">

                    <!-- Grid untuk Nama dan No HP -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="name" class="text-base font-medium text-gray-700 mb-2 block">Nama Lengkap</label>
                            <input type="text" name="name" id="name" placeholder="Masukkan Nama Anda" class="w-full text-lg border-gray-300 py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent rounded-lg shadow-sm">
                        </div>
                        <!-- No. Handphone -->
                        <div>
                            <label for="noHP" class="text-base font-medium text-gray-700 mb-2 block">No. Handphone</label>
                            <input type="text" name="noHP" id="noHP" inputmode="numeric" placeholder="Contoh: 08123456789" class="w-full text-lg border-gray-300 py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent rounded-lg shadow-sm" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>

                    <!-- Tempat Wisata (Full Width) -->
                    <div>
                        <label for="tempat" class="text-base font-medium text-gray-700 mb-2 block">Pilih Tempat Wisata</label>
                        <select type="text" name="tempat" id="tempat" class="w-full text-lg border-gray-300 py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent rounded-lg shadow-sm appearance-none">
                            <option value="paralayang" data-harga="50000">Paralayang - Rp. 50.000</option>
                            <option value="kebun teh" data-harga="60000">Kebun Teh - Rp. 60.000</option>
                            <option value="panyaweuyan" data-harga="70000">Panyaweuyan - Rp. 70.000</option>
                        </select>
                    </div>

                    <!-- Grid untuk Tanggal dan Pengunjung -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal Kunjungan -->
                        <div>
                            <label for="tgl" class="text-base font-medium text-gray-700 mb-2 block">Tanggal Kunjungan</label>
                            <input type="date" class="w-full text-lg border-gray-300 py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent rounded-lg shadow-sm" id="tgl" name="tgl" required />
                        </div>
                        <!-- Jumlah Pengunjung -->
                        <div>
                            <label for="pengunjung" class="text-base font-medium text-gray-700 mb-2 block">Jumlah Pengunjung</label>
                            <input type="number" name="pengunjung" id="pengunjung" placeholder="0" class="w-full text-lg border-gray-300 py-2.5 px-4 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent rounded-lg shadow-sm" min="0">
                        </div>
                    </div>

                    <!-- Harga & Total -->
                    <div class="bg-gray-50 p-6 rounded-lg space-y-4 border border-gray-200">
                        <!-- Harga Tiket -->
                        <div class="flex justify-between items-center">
                            <label for="displayHargaTiket" class="text-lg font-medium text-gray-700">Harga Tiket Satuan</label>
                            <!-- Input yang DILIHAT PENGGUNA (tanpa 'name') -->
                            <input type="text" id="displayHargaTiket" class="text-lg font-medium text-gray-800 bg-transparent border-none text-right focus:outline-none p-0" readonly>
                            <!-- Input yang DIKIRIM KE SERVER (dengan 'name') -->
                            <input type="hidden" name="hargaTiket" id="hargaTiket">
                        </div>
                        <!-- Total Bayar -->
                        <div class="flex justify-between items-center border-t pt-4 mt-4">
                            <label for="displayTotalBayar" class="text-xl font-bold text-gray-800">Total Bayar</label>
                            <!-- Input yang DILIHAT PENGGUNA (tanpa 'name') -->
                            <input type="text" id="displayTotalBayar" class="text-2xl font-bold text-emerald-700 bg-transparent border-none text-right focus:outline-none p-0" readonly>
                            <!-- Input yang DIKIRIM KE SERVER (dengan 'name') -->
                            <input type="hidden" name="totalBayar" id="totalBayar">
                        </div>
                    </div>
                    
                    <!-- Tombol -->
                    <div class="flex flex-col md:flex-row gap-4 pt-6">
                        <button type="submit" class="w-full flex-grow py-3 px-6 text-white bg-blue-800 rounded-lg text-lg font-semibold hover:bg-green-900 transition-colors duration-300 shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Kirim Pesanan
                        </button>
                        <button type="reset" class="w-full md:w-auto py-3 px-6 text-gray-700 bg-gray-200 rounded-lg text-lg font-semibold hover:bg-gray-300 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                            Reset
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        // JavaScript ini disematkan di sini, jadi tidak perlu file script.js eksternal
        document.addEventListener('DOMContentLoaded', () => {
            // Seleksi Elemen
            const form = document.querySelector('form');
            const tempatSelect = document.getElementById('tempat');
            const pengunjungInput = document.getElementById('pengunjung');
            const resetButton = document.querySelector('button[type="reset"]');

            // Input yang DILIHAT PENGGUNA (untuk format Rupiah)
            const displayHargaTiketInput = document.getElementById('displayHargaTiket');
            const displayTotalBayarInput = document.getElementById('displayTotalBayar');

            // Input TERSEMBUNYI (untuk dikirim ke PHP)
            const hiddenHargaTiketInput = document.getElementById('hargaTiket');
            const hiddenTotalBayarInput = document.getElementById('totalBayar');


            // --- Helper Functions ---

            // Format angka ke Rupiah (misal: 50000 -> "Rp 50.000")
            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                }).format(angka || 0);
            }

            // --- Core Functions ---

            // 1. Update harga tiket di input
            function updateHargaTiket() {
                const selectedOption = tempatSelect.options[tempatSelect.selectedIndex];
                const harga = parseFloat(selectedOption.dataset.harga) || 0;
                
                // Set input yang DILIHAT PENGGUNA
                displayHargaTiketInput.value = formatRupiah(harga); // "Rp 50.000"
                
                // Set input TERSEMBUNYI (yang dikirim ke server)
                hiddenHargaTiketInput.value = harga; // 50000
            }

            // 2. Hitung total bayar
            function calculateTotal() {
                // Ambil harga asli (angka) dari input tersembunyi
                const harga = parseFloat(hiddenHargaTiketInput.value) || 0;
                const pengunjung = parseInt(pengunjungInput.value) || 0;
                const total = harga * pengunjung;

                // Set input yang DILIHAT PENGGUNA
                displayTotalBayarInput.value = formatRupiah(total); // "Rp 100.000"
                
                // Set input TERSEMBUNYI (yang dikirim ke server)
                hiddenTotalBayarInput.value = total; // 100000
            }

            // --- Event Listeners ---

            // Saat destinasi diubah
            tempatSelect.addEventListener('change', () => {
                updateHargaTiket();
                calculateTotal(); // Langsung hitung ulang
            });

            // Saat jumlah pengunjung diubah
            pengunjungInput.addEventListener('input', calculateTotal);

            // Saat tombol reset diklik
            resetButton.addEventListener('click', () => {
                // Beri jeda sedikit agar form bisa reset bawaan dulu
                setTimeout(() => {
                    updateHargaTiket(); // Set harga tiket ke default
                    calculateTotal(); // Set total bayar ke 0
                }, 0);
            });
            
            // Saat form disubmit
            form.addEventListener('submit', (e) => {
                e.preventDefault(); // Hentikan submit bawaan

                // Ambil semua data
                const name = document.getElementById('name').value;
                const noHP = document.getElementById('noHP').value;
                const tgl = document.getElementById('tgl').value;
                
                // Ambil data angka dari input tersembunyi
                const pengunjung = pengunjungInput.value;
                const total = parseFloat(hiddenTotalBayarInput.value) || 0;

                // Validasi Sederhana
                if (!name || !noHP || !tgl || !pengunjung || parseInt(pengunjung) <= 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Data Belum Lengkap',
                        text: 'Harap isi semua data dengan benar. Jumlah pengunjung harus lebih dari 0.',
                        confirmButtonColor: '#166534' // Warna tombol hijau
                    });
                    return; // Hentikan proses
                }

                // Tampilkan Konfirmasi (SweetAlert2)
                Swal.fire({
                    title: 'Konfirmasi Pesanan Anda',
                    html: `
                        <div class="text-left space-y-2 p-4">
                            <p><strong>Nama:</strong> ${name}</p>
                            <p><strong>No. HP:</strong> ${noHP}</p>
                            <p><strong>Wisata:</strong> ${tempatSelect.options[tempatSelect.selectedIndex].text.split('-')[0].trim()}</p>
                            <p><strong>Tanggal:</strong> ${new Date(tgl).toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}</p>
                            <p><strong>Pengunjung:</strong> ${pengunjung} orang</p>
                            <hr class="my-3">
                            <!-- Format totalnya lagi hanya untuk TAMPILAN di alert -->
                            <p class="text-xl font-bold text-emerald-700"><strong>Total Bayar:</strong> ${formatRupiah(total)}</p>
                        </div>
                    `,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Pesan Sekarang!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#166534', // green-800
                    cancelButtonColor: '#d33' // red-600
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, tampilkan loading
                        Swal.fire({
                            title: 'Memproses...',
                            text: 'Pesanan Anda sedang dikirim.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        
                        // KIRIM FORM SECARA PROGRAMATIK
                        // Ini akan mengirim data ke action="../lib/insert.php"
                        e.target.submit();
                    }
                });
            });

            // --- Inisialisasi Saat Halaman Dimuat ---
            updateHargaTiket();
            calculateTotal();
        });
    </script>
</body>

</html>

