<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Funactivity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FunActivityController extends Controller
{
    public function index()
    {
        $activities = Funactivity::paginate(10);
        return view('admin.fun_activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.fun_activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'price' => 'nullable|string',
            'pricelist' => 'nullable|string',
            'description' => 'nullable|string',
            'hit' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images/fun_activities'), $imageName);
            $data['img'] = $imageName;
        }

        Funactivity::create($data);

        return redirect()->route('admin.fun_activities.index')->with('success', 'Fun Activity berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $activity = Funactivity::findOrFail($id);
        return view('admin.fun_activities.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $activity = Funactivity::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'img' => 'nullable|image|max:2048',
            'price' => 'nullable|string',
            'pricelist' => 'nullable|string',
            'description' => 'nullable|string',
            'hit' => 'required|integer|min:0',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();  
            $request->img->move(public_path('images/fun_activities'), $imageName);
            $data['img'] = $imageName;
        } else {
            $data['img'] = $activity->img;
        }

        $activity->update($data);

        return redirect()->route('admin.fun_activities.index')->with('success', 'Fun Activity berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $activity = Funactivity::findOrFail($id);
        $activity->delete();
        return redirect()->route('admin.fun_activities.index')->with('success', 'Fun Activity berhasil dihapus.');
    }
}
