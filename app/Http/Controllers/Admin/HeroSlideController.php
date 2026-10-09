<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSlideController extends Controller
{
    /** List all slides + tour options for the add form */
    public function index()
    {
        $slides = HeroSlide::with('tour')->orderBy('order')->get();
        $tours  = Tour::whereNotNull('img')->where('img', '!=', '')->orderBy('title')->get();

        return view('admin.hero_slides.index', compact('slides', 'tours'));
    }

    /** Store a new slide (tour pick or custom upload) */
    public function store(Request $request)
    {
        $request->validate([
            'type'       => 'required|in:tour,custom',
            'tour_id'    => 'required_if:type,tour',
            'image'      => 'required_if:type,custom|image|mimes:jpg,jpeg,png,webp|max:5120',
            'caption'    => 'nullable|string|max:150',
        ]);

        $data = [
            'type'      => $request->type,
            'caption'   => $request->caption,
            'is_active' => true,
            'order'     => HeroSlide::max('order') + 1,
        ];

        if ($request->type === 'tour') {
            $data['tour_id'] = $request->tour_id;
        } else {
            $data['image_path'] = $request->file('image')->store('hero_slides', 'public');
        }

        HeroSlide::create($data);

        return back()->with('success', 'Slide berhasil ditambahkan ke Hero Slider.');
    }

    /** Toggle active/inactive state */
    public function toggleActive(HeroSlide $heroSlide)
    {
        $heroSlide->update(['is_active' => !$heroSlide->is_active]);
        $status = $heroSlide->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Slide berhasil {$status}.");
    }

    /** Update order via AJAX (drag-and-drop) */
    public function updateOrder(Request $request)
    {
        $request->validate(['order' => 'required|array', 'order.*' => 'integer']);

        foreach ($request->order as $position => $id) {
            HeroSlide::where('id', $id)->update(['order' => $position]);
        }

        return response()->json(['success' => true]);
    }

    /** Delete slide, removing custom file if applicable */
    public function destroy(HeroSlide $heroSlide)
    {
        if ($heroSlide->type === 'custom' && $heroSlide->image_path) {
            Storage::disk('public')->delete($heroSlide->image_path);
        }

        $heroSlide->delete();

        return back()->with('success', 'Slide berhasil dihapus.');
    }
}
