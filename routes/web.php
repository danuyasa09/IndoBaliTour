<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelTransferController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tour', function () {
    return view('tour.index');
})->name('tour.index');


Route::get('/tour/car_rental', function () {
    return view('tour.car_rental');
})->name('car_rental');

Route::get('/tour/contact', function () {
    return view('tour.contact');
})->name('contact');


Route::get('/tour/hotel_transfer', [HotelTransferController::class, 'index'])->name('hotel_transfer');

Route::get('/tour/airport_transfer',    function () {
    return view('tour.airport_transfer');
})->name('airport_transfer');

Route::get('/tour/experience', function () {
    return view('tour.experience');
})->name('experience');

Route::get('/tour/detail', function () {
    return view('tour.detail');
})->name('detail');

Route::get('/tour/package_tour', function () {
    return view('tour.package_tour');
})->name('package_tour');

Route::get('/tour/fun_activity', function () {
    return view('tour.fun_activity');
})->name('fun_activity');

use App\Http\Controllers\BlogController;

Route::get('/tour/blog_event', [BlogController::class, 'index'])->name('blog_event');
Route::get('/tour/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/components', function () {
    return view('components.testimoni');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['id', 'en'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');