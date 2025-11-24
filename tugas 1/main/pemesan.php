<div class="container mx-auto pt-28 pb-12 px-4">
    
    <div class="bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100 relative z-10">
        
        <div class="px-6 py-8 bg-white border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold text-teal-900 flex items-center justify-center md:justify-start gap-2">
                    <i class="ph-fill ph-list-dashes text-teal-600"></i> Data Pemesanan
                </h2>
                <p class="text-sm text-gray-500 mt-1">Kelola semua data tiket wisata yang masuk di sini.</p>
            </div>

            <a href="index.php?page=tambah_pesanan" class="w-full md:w-auto py-3 px-6 text-white bg-teal-600 hover:bg-teal-700 rounded-xl text-sm font-bold shadow-lg transition-all flex items-center justify-center gap-2 group">
                <i class="ph-bold ph-plus group-hover:rotate-90 transition-transform"></i>
                Tambah Pesanan
            </a>
        </div>

        <div class="overflow-x-auto custom-scroll">
            <table class="w-full min-w-[1000px]">
                <thead class="bg-teal-50 border-b border-teal-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">No</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">No HP</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">Wisata</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">Tanggal</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-teal-800 uppercase">Jml</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">Total</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-teal-800 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-teal-800 uppercase">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-100">
                    <?php
                    // Include Koneksi
                    if (file_exists('lib/connection.php')) { include 'lib/connection.php'; } 
                    elseif (file_exists('../lib/connection.php')) { include '../lib/connection.php'; }

                    if(isset($conn)){
                        $query = "SELECT * FROM pemesanan_tiket ORDER BY created_at DESC";
                        $result = mysqli_query($conn, $query);
                        
                        if ($result && mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                
                                // Pastikan ID ada valuenya
                                $rowID = isset($row['id']) ? $row['id'] : 0;

                                // Logic Warna Badge
                                $bgClass = '';
                                if ($row['status_pembayaran'] == 'Pending') $bgClass = 'bg-orange-100 text-orange-700 border-orange-200';
                                elseif ($row['status_pembayaran'] == 'Lunas') $bgClass = 'bg-teal-100 text-teal-800 border-teal-200';
                                elseif ($row['status_pembayaran'] == 'Dibatalkan') $bgClass = 'bg-red-100 text-red-700 border-red-200';
                    ?>

                    <tr class="hover:bg-teal-50/30 transition duration-150 text-sm text-gray-700">
                        <td class="px-6 py-4 text-gray-400 font-medium"><?php echo $no++; ?></td>
                        <td class="px-6 py-4 font-bold text-gray-800"><?php echo htmlspecialchars($row['nama_lengkap']); ?></td>
                        <td class="px-6 py-4"><?php echo htmlspecialchars($row['no_handphone']); ?></td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                <?php echo $row['tempat_wisata']; ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"><?php echo date('d M Y', strtotime($row['tanggal_kunjungan'])); ?></td>
                        <td class="px-6 py-4 text-center font-medium"><?php echo $row['jumlah_pengunjung']; ?></td>
                        <td class="px-6 py-4 font-bold text-teal-700 whitespace-nowrap">Rp <?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>

                        <td class="px-4 py-4">
                            <div class="relative w-32 mx-auto">
                                <select onchange="prosesUbahStatus(this)"
                                        data-id="<?php echo $rowID; ?>"
                                        class="appearance-none w-full pl-3 pr-8 py-1.5 rounded-full text-xs font-bold border cursor-pointer outline-none focus:ring-2 focus:ring-teal-500 transition-colors <?php echo $bgClass; ?>">
                                    
                                    <option value="Pending" <?php echo ($row['status_pembayaran'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Lunas" <?php echo ($row['status_pembayaran'] == 'Lunas') ? 'selected' : ''; ?>>Lunas</option>
                                    <option value="Dibatalkan" <?php echo ($row['status_pembayaran'] == 'Dibatalkan') ? 'selected' : ''; ?>>Batal</option>
                                
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-600">
                                    <i class="ph-bold ph-caret-down text-xs"></i>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <a href="index.php?page=edit&id=<?php echo $rowID; ?>" class="text-gray-400 hover:text-yellow-500 transition transform hover:scale-110" title="Edit">
                                    <i class="ph-bold ph-pencil-simple text-xl"></i>
                                </a>
                                <button onclick="hapusData(this)" data-id="<?php echo $rowID; ?>" class="text-gray-400 hover:text-red-500 transition transform hover:scale-110" title="Hapus">
                                    <i class="ph-bold ph-trash text-xl"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <?php }} else { ?>
                    <tr>
                        <td colspan="9" class="px-6 py-16 text-center text-gray-400 bg-gray-50/50">Belum ada data pesanan</td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
        </div>
        
         <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
             <span class="text-xs font-medium text-gray-500 uppercase tracking-wide">
                Total Data: <strong class="text-teal-700"><?= isset($result) && $result ? mysqli_num_rows($result) : 0 ?></strong>
            </span>
        </div>
    </div>
</div>

<script>
    // 1. FUNGSI HAPUS DATA
    function hapusData(tombol) {
        // Ambil ID dari atribut data-id tombolnya
        const id = tombol.getAttribute('data-id');
        
        if(!id) { alert("Error: ID Hapus tidak terbaca!"); return; }

        if(confirm('Apakah Anda yakin ingin menghapus data ini secara permanen?')) {
            window.location.href = 'lib/delete.php?id=' + id;
        }
    }

    // 2. FUNGSI UBAH STATUS
    function prosesUbahStatus(elemenSelect) {
        const statusBaru = elemenSelect.value;
        
        // AMBIL ID DARI ATRIBUT data-id (LEBIH AMAN)
        const id = elemenSelect.getAttribute('data-id');
        
        // Validasi ID
        if (!id || id == '0') {
            alert("Error: ID Data Kosong (0). Cek Database!");
            return;
        }

        // Ganti Warna Visual
        elemenSelect.className = "appearance-none w-full pl-3 pr-8 py-1.5 rounded-full text-xs font-bold border cursor-pointer outline-none focus:ring-2 focus:ring-teal-500 transition-colors";
        if (statusBaru === 'Pending') elemenSelect.classList.add('bg-orange-100', 'text-orange-700', 'border-orange-200');
        else if (statusBaru === 'Lunas') elemenSelect.classList.add('bg-teal-100', 'text-teal-800', 'border-teal-200');
        else if (statusBaru === 'Dibatalkan') elemenSelect.classList.add('bg-red-100', 'text-red-700', 'border-red-200');

        // Kirim Data Manual
        const dataKirim = "id=" + encodeURIComponent(id) + "&status=" + encodeURIComponent(statusBaru);

        fetch("lib/ubah_status.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: dataKirim
        })
        .then(response => response.text())
        .then(text => {
            console.log(text); // Untuk debug
            try {
                const data = JSON.parse(text);
                if (data.success) {
                    const Toast = Swal.mixin({ toast: true, position: 'top-end', showConfirmButton: false, timer: 2000, timerProgressBar: true });
                    Toast.fire({ icon: 'success', title: 'Status tersimpan!' });
                } else {
                    alert("Gagal Simpan: " + data.message);
                }
            } catch (e) {
                alert("Error Backend: " + text);
            }
        })
        .catch(err => {
            alert("Koneksi Terputus: " + err);
        });
    }
</script>