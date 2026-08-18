<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|string',
            'item_title' => 'nullable|string',
            'full_name' => 'required|string',
            'email' => 'nullable|email',
            'phone' => 'required|string',
            'booking_date' => 'nullable|date',
            'total_person' => 'nullable|integer',
        ]);

        $details = $request->except(['_token', 'type', 'item_title', 'full_name', 'email', 'phone', 'booking_date', 'total_person']);

        $booking = new \App\Models\Booking();
        $booking->fill($validated);
        $booking->details = $details;
        $booking->save();

        return back()->with('success', 'Booking submitted successfully! Our team will contact you soon.');
    }

    public function index()
    {
        $bookings = \App\Models\Booking::latest()->paginate(15);
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(\App\Models\Booking $booking)
    {
        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy(\App\Models\Booking $booking)
    {
        $booking->delete();
        return back()->with('success', 'Booking deleted successfully.');
    }
}
