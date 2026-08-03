<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::orderBy('date', 'desc')->paginate(10);
        return view('admin.albums.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.albums.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string',
            'date' => 'required|date',
            'img' => 'nullable|image|max:2048',
            'hit' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images/albums'), $imageName);
            $data['img'] = $imageName;
        }

        Album::create($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|string',
            'date' => 'required|date',
            'img' => 'nullable|image|max:2048',
            'hit' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images/albums'), $imageName);
            $data['img'] = $imageName;
        } else {
            $data['img'] = $album->img;
        }

        $album->update($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('admin.albums.index')->with('success', 'Album berhasil dihapus.');
    }

    // Photo Management inside an Album
    public function show($id)
    {
        $album = Album::with('fotos')->findOrFail($id);
        return view('admin.albums.show', compact('album'));
    }

    public function storePhoto(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $request->validate([
            'img' => 'required|image|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->img->extension();  
            $request->img->move(public_path('images/albums'), $imageName);
            
            Foto::create([
                'id_album' => $album->id,
                'img' => $imageName
            ]);
        }

        return redirect()->route('admin.albums.show', $album->id)->with('success', 'Foto berhasil ditambahkan ke album.');
    }

    public function destroyPhoto($albumId, $photoId)
    {
        $foto = Foto::where('id_album', $albumId)->where('id', $photoId)->firstOrFail();
        $foto->delete();
        
        return redirect()->route('admin.albums.show', $albumId)->with('success', 'Foto berhasil dihapus.');
    }
}
