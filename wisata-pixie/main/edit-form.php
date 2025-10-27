<?php
include 'lib/connection.php';

// Ambil ID yang akan diedit
$id = $_GET['id']; // Pastikan ada parameter ID

// Query ambil data berdasarkan ID
$query = "SELECT * FROM pemesanan_tiket WHERE id = $id";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
?>


<div class="w-full flex justify-center items-center mb-10 mt-28">
    <div class="w-[40rem] border bg-white rounded-md shadow-md p-5">
        <h1 class="text-3xl font-bold text-slate-900 mb-5">Form Pemesanan</h1>
        <form method="post" action="lib/edit.php?id=<?= $id ?>">
            <!-- name -->
            <label for="name" class="text-lg">Nama Lengkap</label>
            <br>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" placeholder="Masukkan Nama Lengkap" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2">
            <!--no HP  -->
            <label for="noHP" class="text-lg">No. Handphone</label>
            <br>
            <input type="text" name="noHP" id="noHP" inputmode="number" value=<?= $data["no_handphone"] ?> placeholder="Masukkan No. Handphone" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
            <!-- tempat wisata -->
            <label for="tempat" class="text-lg">Tempat Wisata</label>
            <br>
            <select type="text" name="tempat" id="tempat" value=<?= $data["tempat_wisata"] ?> class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2">
                <option value="paralayang" data-harga="50000">Paralayang - Rp. 50.000</option>
                <option value="kebun teh" data-harga="60000">Kebun Teh - Rp. 60.000</option>
                <option value="panyaweuyan" data-harga="70000">Panyaweuyan - Rp. 70.000</option>
            </select>
            <!-- tanggal kunjungan -->
            <div>
                <label for="tgl" class="text-lg">Tanggal Kunjungan:</label>
                <br>
                <input type="date" class="form-control" value=<?= $data["tanggal_kunjungan"] ?> id="tgl" name="tgl" required />
            </div>
            <br>
            <!-- jumlah pengunjung -->
            <label for="pengunjung" class="text-lg">Jumlah Pengunjung</label>
            <br>
            <input type="number" name="pengunjung" id="pengunjung" value=<?= $data["jumlah_pengunjung"] ?> placeholder="Masukkan Jumlah Pengunjung" class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2">
            <!-- harga tiket -->
            <label for="hargaTiket" class="text-lg">Harga Tiket (Rp.)</label>
            <br>
            <input type="text" name="hargaTiket" id="hargaTiket" value=<?= $data["harga_tiket"] ?> class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2" readonly>
            <!-- Total Harga -->
            <label for="totalBayar" class="text-lg">Total Bayar (Rp.)</label>
            <br>
            <input type="text" name="totalBayar" id="totalBayar" value=<?= $data["total_bayar"] ?> class="w-full text-lg border py-1 px-2 focus:outline-green-800 rounded-md mb-5 mt-2" readonly>

            <button type="submit" class="py-2 px-6 text-white bg-green-800 rounded-md">Kirim</button>
            <button type="reset" class="py-2 px-6 text-white bg-red-700 rounded-md">Reset</button>
        </form>
    </div>
</div>

<script src="assets/js/script.js"></script>