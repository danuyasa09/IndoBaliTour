<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beritum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Beritum::orderBy('date', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'date' => 'required|date',
            'caption' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['hit'] = 0;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        }

        Beritum::create($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $blog = Beritum::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Beritum::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'date' => 'required|date',
            'caption' => 'nullable|string|max:255',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images'), $imageName);
            $data['img'] = $imageName;
        } else {
            $data['img'] = $blog->img;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $blog = Beritum::findOrFail($id);
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
