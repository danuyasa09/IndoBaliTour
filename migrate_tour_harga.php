<?php
// migrate_tour_harga.php
use App\Models\Tour;
use App\Models\HotelTransfer;

$rate = 0.000063;

function convertText($text, $rate) {
    if (empty($text)) return $text;
    return preg_replace_callback('/(?:Rp|IDR)\s*(\d{1,3}(?:\.\d{3})*)/i', function($matches) use ($rate) {
        $idr = (int) str_replace('.', '', $matches[1]);
        $usd = round($idr * $rate, 2);
        return '$ ' . number_format($usd, 2, '.', '');
    }, $text);
}

// 1. Tours Harga
$tours = Tour::all();
foreach ($tours as $tour) {
    if (is_numeric($tour->harga) && $tour->harga > 500) { // check > 500 to prevent converting already converted USD
        $tour->harga = round($tour->harga * $rate, 2);
    }
    $tour->harga_detail = convertText($tour->harga_detail, $rate);
    $tour->save();
}

// 2. Hotel Transfers
$transfers = HotelTransfer::all();
foreach ($transfers as $tf) {
    if (is_numeric($tf->price) && $tf->price > 500) {
        $tf->price = round($tf->price * $rate, 2);
        $tf->save();
    }
}
echo "Migration phase 2 complete.\n";
