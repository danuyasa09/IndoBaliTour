<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HotelTransfer;
use Illuminate\Http\Request;

class HotelTransferController extends Controller
{
    public function index()
    {
        $transfers = HotelTransfer::orderBy('id', 'desc')->paginate(10);
        return view('admin.hotel_transfers.index', compact('transfers'));
    }

    public function create()
    {
        return view('admin.hotel_transfers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        HotelTransfer::create($request->all());

        return redirect()->route('admin.hotel_transfers.index')->with('success', 'Data Hotel Transfer berhasil ditambahkan.');
    }

    public function edit(HotelTransfer $hotel_transfer)
    {
        return view('admin.hotel_transfers.edit', compact('hotel_transfer'));
    }

    public function update(Request $request, HotelTransfer $hotel_transfer)
    {
        $request->validate([
            'start' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $hotel_transfer->update($request->all());

        return redirect()->route('admin.hotel_transfers.index')->with('success', 'Data Hotel Transfer berhasil diperbarui.');
    }

    public function destroy(HotelTransfer $hotel_transfer)
    {
        $hotel_transfer->delete();
        return redirect()->route('admin.hotel_transfers.index')->with('success', 'Data Hotel Transfer berhasil dihapus.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $transfer = HotelTransfer::findOrFail($id);
        $newStatus = $request->input('status') ?: ($transfer->status === 'Show' ? 'Hide' : 'Show');
        $transfer->update(['status' => $newStatus]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Status hotel transfer '{$transfer->start} -> {$transfer->destination}' berhasil diubah menjadi {$newStatus}.",
                'status' => $newStatus,
            ]);
        }

        return back()->with('success', "Status hotel transfer '{$transfer->start} -> {$transfer->destination}' berhasil diubah menjadi {$newStatus}.");
    }
}
