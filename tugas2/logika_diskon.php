<?php

// Prosedur untuk menghitung diskon
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja; // Diskon 10%
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja; // Diskon 5%
    }

    return $diskon; // Mengembalikan nilai diskon
}

// Contoh pemanggilan prosedur
$totalBelanja = 120000;
$diskon = hitungDiskon($totalBelanja);

echo "Total Belanja: Rp. " . $totalBelanja . "<br>";
echo "Diskon: Rp. " . $diskon . "<br>";
echo "Total yang harus dibayar: Rp. " . ($totalBelanja - $diskon);
?>
