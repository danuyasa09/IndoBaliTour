<?php
// migrate_to_usd.php
use App\Models\Tour;
use App\Models\Funactivity;
use App\Models\Airport;

$rate = 0.000063;

function convertText($text, $rate) {
    if (empty($text)) return $text;
    return preg_replace_callback('/(?:Rp|IDR)\s*(\d{1,3}(?:\.\d{3})*)/i', function($matches) use ($rate) {
        $idr = (int) str_replace('.', '', $matches[1]);
        $usd = round($idr * $rate, 2);
        return '$ ' . number_format($usd, 2, '.', '');
    }, $text);
}

// 1. Tours
$tours = Tour::all();
foreach ($tours as $tour) {
    $tour->pricelist = convertText($tour->pricelist, $rate);
    $tour->content = convertText($tour->content, $rate);
    $tour->save();
}

// 2. Fun Activities
$activities = Funactivity::all();
foreach ($activities as $act) {
    if (is_numeric($act->price)) {
        $act->price = round($act->price * $rate, 2);
    }
    $act->pricelist = convertText($act->pricelist, $rate);
    $act->content = convertText($act->content, $rate);
    $act->save();
}

// 3. Airport Transfer
$airports = Airport::all();
foreach ($airports as $airport) {
    if (is_numeric($airport->price)) {
        $airport->price = round($airport->price * $rate, 2);
    }
    $airport->save();
}
echo "Migration complete.\n";
