<?php
if (file_exists('lib/connection.php')) { include 'lib/connection.php'; } 
elseif (file_exists('../lib/connection.php')) { include '../lib/connection.php'; }

if (!isset($_GET['id'])) {
    echo "<script>window.location='index.php?page=pemesanan';</script>"; exit;
}

$id = $_GET['id'];
$id_safe = mysqli_real_escape_string($conn, $id);
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pemesanan_tiket WHERE id = '$id_safe'"));

if (!$data) { echo "Data tidak ditemukan."; exit; }
?>

<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm overflow-y-auto">
    
    <div class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in-up">
        
        <a href="index.php?page=pemesanan" class="absolute top-4 right-4 text-white/70 hover:text-white bg-black/20 hover:bg-black/40 rounded-full p-2 transition">
            <i class="ph-bold ph-x text-xl"></i>
        </a>

        <div class="bg-teal-700 px-8 py-6">
            <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                <i class="ph-bold ph-pencil-simple-line"></i> Edit Data
            </h1>
            <p class="text-teal-100 text-xs mt-1">Ubah data tiket #<?= $data['id'] ?></p>
        </div>

        <form method="post" action="lib/edit.php" class="p-6 space-y-4">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">

            <div>
                <label class="text-xs font-bold text-gray-500 uppercase">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" class="w-full border-b-2 border-gray-200 focus:border-teal-500 px-2 py-2 outline-none font-semibold text-gray-700 transition-colors" required>
            </div>

            <div>
                <label class="text-xs font-bold text-gray-500 uppercase">No HP</label>
                <input type="number" name="no_handphone" value="<?= htmlspecialchars($data['no_handphone']) ?>" class="w-full border-b-2 border-gray-200 focus:border-teal-500 px-2 py-2 outline-none font-semibold text-gray-700 transition-colors" required>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">Wisata</label>
                    <select name="tempat_wisata" id="tempat_wisata" onchange="hitung()" class="w-full border-b-2 border-gray-200 focus:border-teal-500 px-2 py-2 outline-none font-semibold text-gray-700 bg-transparent cursor-pointer">
                        <option value="Kebun Teh" data-harga="60000" <?= $data['tempat_wisata']=='Kebun Teh'?'selected':'' ?>>Kebun Teh</option>
                        <option value="Paralayang" data-harga="50000" <?= $data['tempat_wisata']=='Paralayang'?'selected':'' ?>>Paralayang</option>
                        <option value="Panyaweuyan" data-harga="70000" <?= $data['tempat_wisata']=='Panyaweuyan'?'selected':'' ?>>Panyaweuyan</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs font-bold text-gray-500 uppercase">Tanggal</label>
                    <input type="date" name="tanggal_kunjungan" value="<?= $data['tanggal_kunjungan'] ?>" class="w-full border-b-2 border-gray-200 focus:border-teal-500 px-2 py-2 outline-none font-semibold text-gray-700" required>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-xl flex items-center justify-between border border-gray-100">
                <div class="flex items-center gap-2">
                    <span class="text-xs text-gray-500">Jml Org:</span>
                    <input type="number" name="jumlah_pengunjung" id="jml" value="<?= $data['jumlah_pengunjung'] ?>" min="1" oninput="hitung()" class="w-12 text-center border rounded font-bold text-teal-700">
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-400">Total Bayar</p>
                    <p class="text-xl font-bold text-teal-700">Rp <span id="txt_total">0</span></p>
                    <input type="hidden" name="total_bayar" id="total_bayar" value="<?= $data['total_bayar'] ?>">
                </div>
            </div>

            <button type="submit" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl font-bold shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                Simpan Perubahan
            </button>
        </form>
    </div>
</div>

<script>
    function hitung() {
        let harga = document.getElementById('tempat_wisata').selectedOptions[0].getAttribute('data-harga');
        let jml = document.getElementById('jml').value;
        let total = harga * jml;
        document.getElementById('txt_total').innerText = new Intl.NumberFormat('id-ID').format(total);
        document.getElementById('total_bayar').value = total;
    }
    document.addEventListener("DOMContentLoaded", hitung);
</script>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.3s ease-out forwards; }
</style>