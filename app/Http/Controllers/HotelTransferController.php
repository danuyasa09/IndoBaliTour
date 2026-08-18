<?php

namespace App\Http\Controllers;

use App\Models\HotelTransfer; // 1. Pastikan Model-nya di-import di paling atas
use Illuminate\Http\Request;

class HotelTransferController extends Controller
{
    public function index()
    {
        // 2. Ambil datanya dari database
        // (Kamu bisa pakai ::all(), ::where('status', 'Show')->get(), dll)
        $transfers = HotelTransfer::all();

        // 3. Lempar variabelnya ke view menggunakan compact()
        // Pastikan nama di dalam compact sama dengan nama variabel tanpa tanda '$'
        return view('tour.transfers.hotel', compact('transfers'));
    }
}