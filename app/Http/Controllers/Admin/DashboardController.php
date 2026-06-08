<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\GalleryImage;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'posts' => Post::where('is_published', true)->count(),
            'drafts' => Post::where('is_published', false)->count(),
            'images' => GalleryImage::count(),
            'unread_messages' => Contact::unread()->count(),
        ];

        $recentContacts = Contact::latest()->limit(5)->get();
        $recentPosts = Post::with('category')->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentPosts'));
    }
}
