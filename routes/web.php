<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelTransferController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tour', function () {
    $tours = \App\Models\Tour::take(3)->get();
    return view('tour.index', compact('tours'));
})->name('tour.index');


Route::get('/tour/car_rental', function () {
    $cars = \App\Models\Car::all();
    return view('tour.car_rental', compact('cars'));
})->name('car_rental');

Route::get('/tour/contact', function () {
    $pengaturan = \App\Models\Pengaturan::first();
    return view('tour.contact', compact('pengaturan'));
})->name('contact');


Route::get('/tour/hotel_transfer', [HotelTransferController::class, 'index'])->name('hotel_transfer');

Route::get('/tour/airport_transfer',    function () {
    $airports = \App\Models\Airport::where('status', 'Show')->get();
    return view('tour.airport_transfer', compact('airports'));
})->name('airport_transfer');

Route::get('/tour/experience', function () {
    return view('tour.experience');
})->name('experience');

Route::get('/tour/detail', function () {
    return view('tour.detail');
})->name('detail');

Route::get('/tour/package_tour', function () {
    $tours = \App\Models\Tour::all();
    return view('tour.package_tour', compact('tours'));
})->name('package_tour');

Route::get('/tour/fun_activity', function () {
    $activities = \App\Models\Funactivity::where('status', 'Show')->get();
    return view('tour.fun_activity', compact('activities'));
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