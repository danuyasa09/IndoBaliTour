<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Testimony;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('testimonies', 'public');
            $validated['photo'] = $photoPath;
        }

        Testimony::create($validated);

        return redirect()->back()->with('success', 'Testimoni Anda berhasil dikirim dan menunggu persetujuan tim kami. Terima kasih!');
    }
}
