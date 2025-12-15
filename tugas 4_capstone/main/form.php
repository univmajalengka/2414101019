<div class="min-h-screen flex items-center justify-center pt-24 pb-12 px-4 md:px-0">
    
    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden relative z-10">
        
        <div class="bg-teal-700 px-6 py-6 text-center relative">
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white rounded-full"></div>
                <div class="absolute top-10 -left-10 w-20 h-20 bg-white rounded-full"></div>
            </div>
            <h1 class="text-2xl font-bold text-white flex items-center justify-center gap-2 relative z-10">
                <i class="ph-bold ph-ticket"></i> Pesan Tiket
            </h1>
            <p class="text-teal-100 text-sm mt-1 relative z-10">Isi data untuk liburan seru di Pixie.</p>
        </div>

        <form method="post" action="lib/insert.php" class="p-6 md:p-8 space-y-5">
            
            <div>
                <label class="text-xs font-bold text-black uppercase tracking-wider mb-1 block">Nama Lengkap</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-black"><i class="ph-bold ph-user"></i></span>
                    <input type="text" name="nama_lengkap" placeholder="Nama sesuai KTP" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-black font-medium focus:border-teal-500 focus:bg-white focus:ring-2 focus:ring-teal-200 transition-all outline-none" required>
                </div>
            </div>

            <div>
                <label class="text-xs font-bold text-black uppercase tracking-wider mb-1 block">WhatsApp / No HP</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-black"><i class="ph-bold ph-whatsapp-logo"></i></span>
                    <input type="number" name="no_handphone" placeholder="08xxx" class="w-full pl-10 pr-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-black font-medium focus:border-teal-500 focus:bg-white focus:ring-2 focus:ring-teal-200 transition-all outline-none" required>
                </div>
            </div>

            <div>
                <label class="text-xs font-bold text-black uppercase tracking-wider mb-1 block">Destinasi Wisata</label>
                <div class="relative">
                    <select name="tempat_wisata" id="tempat_wisata" onchange="updateUI()" 
                            class="w-full pl-4 pr-10 py-3 rounded-xl bg-gray-50 border border-gray-200 text-black font-bold focus:border-teal-500 focus:bg-white focus:ring-2 focus:ring-teal-200 transition-all outline-none appearance-none cursor-pointer">
                        <option value="" disabled selected>Pilih Paket Wisata...</option>
                        <option value="Kebun Teh" data-harga="60000">🌲 Situ Cipanten (Rp 60.000)</option>
                        <option value="Paralayang" data-harga="50000">🪂 Curug Ibun Pelangi (Rp 50.000)</option>
                        <option value="Panyaweuyan" data-harga="70000">⛰️ Panyaweuyan (Rp 70.000)</option>
                    </select>
                    <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-black"><i class="ph-bold ph-caret-down"></i></div>
                </div>
            </div>

            <div id="preview-card" class="hidden relative w-full h-64 md:h-96 rounded-3xl overflow-hidden shadow-lg group mt-4 bg-gray-100 border border-gray-200">
                
                <img id="preview-img" src="" alt="Wisata" class="w-full h-full object-cover transition-transform duration-700 hover:scale-105">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent pointer-events-none"></div>

                <button type="button" onclick="geserGambar(-1)" class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-3 rounded-full backdrop-blur-md transition-all shadow-lg hover:scale-110 z-20">
                    <i class="ph-bold ph-caret-left text-2xl"></i>
                </button>
                <button type="button" onclick="geserGambar(1)" class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-3 rounded-full backdrop-blur-md transition-all shadow-lg hover:scale-110 z-20">
                    <i class="ph-bold ph-caret-right text-2xl"></i>
                </button>

                <div class="absolute bottom-0 left-0 p-6 w-full flex flex-col md:flex-row justify-between items-end md:items-center gap-4 pointer-events-auto z-20">
                    <div>
                        <div class="flex items-center gap-2 text-teal-300 text-sm font-bold mb-1">
                            <i class="ph-fill ph-camera"></i> Galeri Foto
                        </div>
                        <h3 id="preview-title" class="text-white font-extrabold text-2xl md:text-3xl leading-none drop-shadow-md">Nama Tempat</h3>
                    </div>
                    
                    <a id="video-link" href="#" target="_blank" class="flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-2.5 rounded-full text-sm font-bold transition-all shadow-lg hover:shadow-red-500/50 transform hover:-translate-y-1 border border-red-500">
                        <i class="ph-fill ph-youtube-logo text-xl"></i> Tonton Video
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-xs font-bold text-black uppercase tracking-wider mb-1 block">Tanggal</label>
                    <input type="date" name="tanggal_kunjungan" id="tanggal_kunjungan" class="w-full px-4 py-3 rounded-xl bg-gray-50 border border-gray-200 text-black font-medium focus:border-teal-500 outline-none" required>
                </div>
                <div>
                    <label class="text-xs font-bold text-black uppercase tracking-wider mb-1 block">Tiket</label>
                    <div class="flex items-center border border-gray-200 rounded-xl bg-gray-50 overflow-hidden">
                        <button type="button" onclick="ubahJml(-1)" class="px-3 py-3 hover:bg-gray-200 text-black transition active:bg-gray-300"><i class="ph-bold ph-minus"></i></button>
                        <input type="number" name="jumlah_pengunjung" id="jml" value="1" min="1" oninput="hitung()" class="w-full text-center bg-transparent border-none outline-none font-bold text-black appearance-none">
                        <button type="button" onclick="ubahJml(1)" class="px-3 py-3 hover:bg-gray-200 text-black transition active:bg-gray-300"><i class="ph-bold ph-plus"></i></button>
                    </div>
                </div>
            </div>

            <div class="bg-emerald-50 rounded-xl p-4 border border-emerald-100 flex flex-col sm:flex-row justify-between items-center gap-2 text-center sm:text-left">
                <span class="text-sm font-bold text-black uppercase">Total Pembayaran</span>
                <span class="text-2xl font-extrabold text-black">Rp <span id="txt_total">0</span></span>
                <input type="hidden" name="total_bayar" id="total_bayar">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-4 bg-teal-600 hover:bg-teal-700 text-white rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all flex items-center justify-center gap-2">
                    <i class="ph-bold ph-paper-plane-right"></i> Konfirmasi Pesanan
                </button>
                <a href="index.php" class="block text-center mt-4 text-sm text-gray-400 hover:text-black transition">Batal & Kembali</a>
            </div>
        </form>
    </div>
</div>

<script>
    // --- DATABASE DATA WISATA ---
    const destinasiData = {
        'Kebun Teh': {
            title: 'Situ Cipanten',
            images: [
                'assets/img/situu.jpeg',
                'assets/img/situuu3.jpeg'
            ],
            video: 'https://youtu.be/HepVRof4t3E?si=ordniYfbQzSK0lbi'
        },
        'Paralayang': {
            title: 'Spot Curug Ibun Pelangi',
            images: [
                'assets/img/ibun.jpeg',
                'assets/img/curug.jpeg'
            ],
            video: 'https://youtu.be/Rjk0kn-6xLE?si=Im3kqH1DM0mXnUog'
        },
        'Panyaweuyan': {
            title: 'Terasering Panyaweuyan',
            images: [
                'assets/img/panyaw2.jpg',
                'assets/img/panyaw.jpg'
            ],
            video: 'https://youtu.be/KT-Gy-QIPb4?si=UoxahdW8h4Ofk9cr'
        }
    };

    // Variabel Slider
    let currentImageIndex = 0;
    let currentImageList = [];

    // --- UPDATE UI ---
    function updateUI() {
        hitung();

        const select = document.getElementById('tempat_wisata');
        const selectedValue = select.value;
        const previewCard = document.getElementById('preview-card');
        
        if (!selectedValue || !destinasiData[selectedValue]) {
            previewCard.classList.add('hidden');
            return;
        }

        const data = destinasiData[selectedValue];
        currentImageList = data.images;
        currentImageIndex = 0;
        
        document.getElementById('preview-title').innerText = data.title;
        document.getElementById('video-link').href = data.video;
        
        tampilkanFoto();
        
        previewCard.classList.remove('hidden');
    }

    // --- SLIDER MANUAL ---
    function geserGambar(arah) {
        if (currentImageList.length === 0) return;
        currentImageIndex = (currentImageIndex + arah + currentImageList.length) % currentImageList.length;
        tampilkanFoto();
    }

    function tampilkanFoto() {
        const imgEl = document.getElementById('preview-img');
        imgEl.src = currentImageList[currentImageIndex];
    }

    // --- HITUNG HARGA ---
    function hitung() {
        const select = document.getElementById('tempat_wisata');
        let harga = 0;
        if(select.selectedIndex > 0) {
            harga = select.options[select.selectedIndex].getAttribute('data-harga');
        }
        let jml = document.getElementById('jml').value;
        if(jml < 1 || isNaN(jml)) { jml = 1; document.getElementById('jml').value = 1; }

        let total = harga * jml;
        document.getElementById('txt_total').innerText = new Intl.NumberFormat('id-ID').format(total);
        document.getElementById('total_bayar').value = total;
    }

    function ubahJml(n) {
        let input = document.getElementById('jml');
        let val = parseInt(input.value) + n;
        if(val < 1) val = 1;
        input.value = val;
        hitung();
    }

    document.getElementById('tanggal_kunjungan').valueAsDate = new Date();
</script>