<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Testimony;
use App\Models\Tour;
use App\Models\Car;
use App\Models\Booking;
use App\Models\JobApplication;
use App\Models\Funactivity;
use App\Models\HotelTransfer;
use App\Models\Airport;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'testimonies' => Testimony::count(),
            'tours' => Tour::count(),
            'cars' => Car::count(),
            'bookings' => Booking::count(),
            'job_applications' => JobApplication::count(),
            'fun_activities' => Funactivity::count(),
            'hotel_transfers' => HotelTransfer::count(),
            'airports' => Airport::count(),
        ];

        $recent_testimonies = Testimony::latest()->take(5)->get();
        $recent_bookings = Booking::latest()->take(5)->get();
        $recent_job_applications = JobApplication::latest()->take(5)->get();

        // Chart Data: Monthly Bookings for the current year
        $monthlyBookings = [];
        for ($m = 1; $m <= 12; $m++) {
            $monthlyBookings[] = Booking::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $m)
                ->count();
        }

        return view('admin.dashboard', compact(
            'stats',
            'recent_testimonies',
            'recent_bookings',
            'recent_job_applications',
            'monthlyBookings'
        ));
    }
}
