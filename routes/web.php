<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelTransferController;

use App\Http\Controllers\TestimonyController;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $tours = \App\Models\Tour::take(3)->get();
    $testimonies = \App\Models\Testimony::where('is_approved', true)->latest()->take(3)->get();
    $albums = \App\Models\Album::with('fotos')->where('status', 'Show')->orderBy('date', 'desc')->get();
    $videos = \App\Models\Video::where('status', 'Show')->orderBy('date', 'desc')->take(3)->get();
    return view('welcome', compact('tours', 'testimonies', 'albums', 'videos'));
})->name('tour.index');

Route::middleware('guest')->group(function () {
    Route::get('/admin-login', [AuthController::class, 'login'])->name('login');
    Route::post('/admin-login', [AuthController::class, 'authenticate'])->name('login.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('/testimony', [TestimonyController::class, 'store'])->name('testimony.store');

use App\Http\Controllers\BookingController;
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

use App\Http\Controllers\TeamController;
Route::get('/our-team', [TeamController::class, 'index'])->name('team.index');
Route::post('/our-team/apply', [TeamController::class, 'storeApplication'])->name('team.apply');

// Custom Admin Panel Routes
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\TestimonyController as AdminTestimonyController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;
use App\Http\Controllers\Admin\AirportController as AdminAirportController;
use App\Http\Controllers\Admin\HotelTransferController as AdminHotelTransferController;
use App\Http\Controllers\Admin\JobApplicationController as AdminJobApplicationController;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('tours', AdminTourController::class);
    Route::resource('cars', AdminCarController::class);
    Route::resource('fun_activities', \App\Http\Controllers\Admin\FunActivityController::class);
    
    Route::resource('testimonies', AdminTestimonyController::class)->except(['create', 'store']);
    Route::patch('testimonies/{testimony}/approve', [AdminTestimonyController::class, 'approve'])->name('testimonies.approve');

    Route::resource('blogs', AdminBlogController::class);
    Route::resource('videos', AdminVideoController::class);
    Route::resource('albums', AdminAlbumController::class);
    Route::post('albums/{album}/photos', [AdminAlbumController::class, 'storePhoto'])->name('albums.photos.store');
    Route::delete('albums/{album}/photos/{photo}', [AdminAlbumController::class, 'destroyPhoto'])->name('albums.photos.destroy');

    Route::resource('airports', AdminAirportController::class);
    Route::resource('hotel_transfers', AdminHotelTransferController::class);

    Route::get('bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::delete('bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    Route::get('job-applications', [AdminJobApplicationController::class, 'index'])->name('job_applications.index');
    Route::get('job-applications/{application}', [AdminJobApplicationController::class, 'show'])->name('job_applications.show');
    Route::patch('job-applications/{application}/status', [AdminJobApplicationController::class, 'updateStatus'])->name('job_applications.updateStatus');
    Route::delete('job-applications/{application}', [AdminJobApplicationController::class, 'destroy'])->name('job_applications.destroy');
});

Route::get('/tour', function () {
    return redirect()->route('tour.index');
});


Route::get('/tour/car_rental', function () {
    $cars = \App\Models\Car::all();
    return view('tour.services.car_rental', compact('cars'));
})->name('car_rental');

Route::get('/tour/contact', function () {
    $pengaturan = \App\Models\Pengaturan::first();
    return view('tour.pages.contact', compact('pengaturan'));
})->name('contact');


Route::get('/tour/hotel_transfer', [HotelTransferController::class, 'index'])->name('hotel_transfer');

Route::get('/tour/airport_transfer',    function () {
    $airports = \App\Models\Airport::where('status', 'Show')->get();
    return view('tour.transfers.airport', compact('airports'));
})->name('airport_transfer');

Route::get('/tour/experience', function () {
    $testimonies = \App\Models\Testimony::where('is_approved', true)->latest()->get();
    $albums = \App\Models\Album::with('fotos')->where('status', 'Show')->orderBy('date', 'desc')->get();
    $videos = \App\Models\Video::where('status', 'Show')->orderBy('date', 'desc')->get();
    return view('tour.pages.experience', compact('testimonies', 'albums', 'videos'));
})->name('experience');

Route::get('/tour/detail/{slug}', function ($slug) {
    $tour = \App\Models\Tour::where('slug', $slug)->firstOrFail();
    $related_tours = \App\Models\Tour::where('slug', '!=', $slug)->take(3)->get();
    return view('tour.packages.detail', compact('tour', 'related_tours'));
})->name('detail');

Route::get('/tour/package_tour', function () {
    $tours = \App\Models\Tour::all();
    return view('tour.packages.index', compact('tours'));
})->name('package_tour');

Route::get('/tour/fun_activity', function () {
    $activities = \App\Models\Funactivity::where('status', 'Show')->get();
    return view('tour.activities.index', compact('activities'));
})->name('fun_activity');

Route::get('/tour/fun_activity/{id}', function ($id) {
    // Funactivity might have string id or we can use slug if preferred, but user just said "id". 
    // The model says public $incrementing = false; maybe it doesn't have an auto-incrementing ID?
    // Let's check if the primary key is 'id' or not. Usually it's 'id'.
    // If not, maybe use slug. But let's use id for now and fall back to slug if needed.
    // Let's use where('id', $id) or where('slug', $id)
    $activity = \App\Models\Funactivity::where('id', $id)->orWhere('slug', $id)->firstOrFail();
    $related_activities = \App\Models\Funactivity::where('status', 'Show')->where('id', '!=', $activity->id)->take(3)->get();
    return view('tour.activities.show', compact('activity', 'related_activities'));
})->name('fun_activity.show');

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