<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/tour/hotel_transfer', function () {
    return view('tour.hotel_transfer');
})->name('hotel_transfer');

Route::get('/tour/airport_transfer', function () {
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

Route::get('/tour/blog_event', function () {
    return view('tour.blog&event');
})->name('blog_event');