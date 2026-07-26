<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::paginate(10);
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        return view('admin.tours.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'date' => 'nullable|date',
            'harga' => 'nullable|string',
            'harga_detail' => 'nullable|string',
            'pricelist' => 'nullable|string',
            'short' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['hit'] = 0; // default value

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        }

        Tour::create($data);

        return redirect()->route('admin.tours.index')->with('success', 'Paket tour berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tours.edit', compact('tour'));
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'date' => 'nullable|date',
            'harga' => 'nullable|string',
            'harga_detail' => 'nullable|string',
            'pricelist' => 'nullable|string',
            'short' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            // Optional: delete old image if stored in public/images/tour
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        } else {
            $data['img'] = $tour->img;
        }

        $tour->update($data);

        return redirect()->route('admin.tours.index')->with('success', 'Paket tour berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        // Optional: delete image from public/images/tour
        $tour->delete();
        return redirect()->route('admin.tours.index')->with('success', 'Paket tour berhasil dihapus.');
    }
}
