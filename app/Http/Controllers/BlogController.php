<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Beritum::where('status', 'Show')->orderBy('date', 'desc')->get();

        $blogChunks = $blogs->chunk(9);

        return view('tour.blogs.index', compact('blogs', 'blogChunks'));
    }

    public function show($slug)
    {
        $blog = \App\Models\Beritum::where('slug', $slug)->firstOrFail();
        
        // Increment visitor hit count
        $blog->hit = $blog->hit + 1;
        $blog->save();
        
        $otherBlogs = \App\Models\Beritum::where('status', 'Show')
            ->where('id', '!=', $blog->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('tour.blogs.show', compact('blog', 'otherBlogs'));
    }
}
