document.addEventListener("DOMContentLoaded", function () {
  const tempatSelect = document.getElementById("tempat");
  const pengunjungInput = document.getElementById("pengunjung");
  const hargaTiketInput = document.getElementById("hargaTiket");
  const totalBayarInput = document.getElementById("totalBayar");

  function updateHarga() {
    const selectedOption = tempatSelect.options[tempatSelect.selectedIndex];
    const hargaTiket = parseInt(selectedOption.getAttribute("data-harga")) || 0;
    const jumlahPengunjung = parseInt(pengunjungInput.value) || 0;

    // Update harga tiket
    hargaTiketInput.value = hargaTiket;

    // Hitung total bayar
    const totalBayar = hargaTiket * jumlahPengunjung;
    totalBayarInput.value = totalBayar;
  }

  // Event listener untuk perubahan pada tempat wisata
  tempatSelect.addEventListener("change", updateHarga);

  // Event listener untuk perubahan pada jumlah pengunjung
  pengunjungInput.addEventListener("input", updateHarga);
});
