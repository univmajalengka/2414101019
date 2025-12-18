<?php
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    } else {
        $diskon = 0;
    }

    return $diskon;
}

$totalBelanja = 120000;
$diskon = hitungDiskon($totalBelanja);
$totalBayar = $totalBelanja - $diskon;

echo "Total Belanja : Rp. $totalBelanja<br>";
echo "Diskon        : Rp. $diskon<br>";
echo "Total Bayar   : Rp. $totalBayar";
?>
