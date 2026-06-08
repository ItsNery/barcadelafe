<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\Post;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        $featuredImages = GalleryImage::featured()->ordered()->limit(6)->get();
        $recentPosts = Post::published()->with('category')->latest('published_at')->limit(3)->get();

        return view('home', compact('featuredImages', 'recentPosts'));
    }
}
