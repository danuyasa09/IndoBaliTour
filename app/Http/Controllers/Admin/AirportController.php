<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        $airports = Airport::orderBy('id', 'desc')->paginate(10);
        return view('admin.airports.index', compact('airports'));
    }

    public function create()
    {
        return view('admin.airports.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Airport::create($request->all());

        return redirect()->route('admin.airports.index')->with('success', 'Data Airport Transfer berhasil ditambahkan.');
    }

    public function edit(Airport $airport)
    {
        return view('admin.airports.edit', compact('airport'));
    }

    public function update(Request $request, Airport $airport)
    {
        $request->validate([
            'start' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $airport->update($request->all());

        return redirect()->route('admin.airports.index')->with('success', 'Data Airport Transfer berhasil diperbarui.');
    }

    public function destroy(Airport $airport)
    {
        $airport->delete();
        return redirect()->route('admin.airports.index')->with('success', 'Data Airport Transfer berhasil dihapus.');
    }

    public function toggleStatus(Request $request, $id)
    {
        $airport = Airport::findOrFail($id);
        $newStatus = $request->input('status') ?: ($airport->status === 'Show' ? 'Hide' : 'Show');
        $airport->update(['status' => $newStatus]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Status airport transfer '{$airport->start} -> {$airport->destination}' berhasil diubah menjadi {$newStatus}.",
                'status' => $newStatus,
            ]);
        }

        return back()->with('success', "Status airport transfer '{$airport->start} -> {$airport->destination}' berhasil diubah menjadi {$newStatus}.");
    }
}
