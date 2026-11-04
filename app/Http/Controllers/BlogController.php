<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\Beritum::where('status', 'Show')->orderBy('date', 'desc')->get();

        // ===== DUMMY DATA FOR TESTING (hapus setelah selesai test) =====
        $dummyTitles = [
            'Top 10 Hidden Beaches in Bali You Must Visit',
            'A Complete Guide to Ubud: Culture, Food & Nature',
            'Nusa Penida Day Trip: Everything You Need to Know',
            'Bali on a Budget: How to Travel Smart in Paradise',
            'Best Sunset Spots in Bali for Romantic Evenings',
            'Balinese Cuisine: 15 Dishes You Cannot Miss',
            'Surfing in Bali: Best Spots for Beginners & Pros',
            'Mount Batur Sunrise Trek: The Ultimate Guide',
            'Bali Spirit Festival: Art, Yoga & Culture',
            'Seminyak vs Canggu: Which Area is Right for You?',
            'Temple Hopping in Bali: A Sacred Journey',
            'Bali Water Sports: Thrilling Activities in the Sea',
            'Rice Terrace Trek: Tegalalang & Beyond',
            'The Best Bali Coffee Shops for Digital Nomads',
            'How to Plan the Perfect 7-Day Bali Itinerary',
            'Kuta vs Legian: What Changed in 2026',
            'Eco-Tourism in Bali: Travel Responsibly',
            'Bali Nightlife Guide: Where the Locals Go',
        ];
        $dummyImages = [
            'https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1570789210967-2cac24afeb00?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1559628233-eb1b1a45564b?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1604999333679-b86d54738315?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1512100356356-de1b84283e18?q=80&w=600&auto=format&fit=crop',
            'https://images.unsplash.com/photo-1588668214407-6ea9a6d8c272?q=80&w=600&auto=format&fit=crop',
        ];
        $dummyContent = 'Bali is one of the most magical destinations in Southeast Asia, offering a perfect blend of culture, nature, and adventure. From pristine beaches to lush rice terraces, every corner of this island tells a unique story worth exploring.';

        $dummyBlogs = collect($dummyTitles)->map(function ($title, $i) use ($dummyImages, $dummyContent) {
            return (object)[
                'id'      => 9999 + $i,
                'title'   => $title,
                'slug'    => \Illuminate\Support\Str::slug($title),
                'img'     => null,
                'img_url' => $dummyImages[$i % count($dummyImages)],
                'content' => $dummyContent,
                'date'    => now()->subDays($i * 3)->format('Y-m-d'),
                'status'  => 'Show',
            ];
        });

        // Merge real + dummy, lalu chunk 9 per halaman
        $mergedBlogs = $blogs->concat($dummyBlogs);
        $blogChunks = $mergedBlogs->chunk(9);
        // ===== END DUMMY =====

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
