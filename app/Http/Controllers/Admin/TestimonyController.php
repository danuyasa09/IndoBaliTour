<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    public function index()
    {
        $testimonies = Testimony::latest()->paginate(10);
        return view('admin.testimonies.index', compact('testimonies'));
    }

    public function edit(Testimony $testimony)
    {
        return view('admin.testimonies.edit', compact('testimony'));
    }

    public function update(Request $request, Testimony $testimony)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');
        $data['is_approved'] = $request->has('is_approved');

        if ($request->hasFile('photo')) {
            if ($testimony->photo) {
                Storage::disk('public')->delete($testimony->photo);
            }
            $data['photo'] = $request->file('photo')->store('testimonies', 'public');
        }

        $testimony->update($data);

        return redirect()->route('admin.testimonies.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function approve(Testimony $testimony)
    {
        $testimony->update(['is_approved' => !$testimony->is_approved]);
        $status = $testimony->is_approved ? 'disetujui' : 'dibatalkan persetujuannya';
        return redirect()->route('admin.testimonies.index')->with('success', "Testimoni berhasil {$status}.");
    }

    public function destroy(Testimony $testimony)
    {
        if ($testimony->photo) {
            Storage::disk('public')->delete($testimony->photo);
        }
        $testimony->delete();
        return redirect()->route('admin.testimonies.index')->with('success', 'Testimoni berhasil dihapus.');
    }
}
