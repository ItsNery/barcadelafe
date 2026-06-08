<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');
        $search = $request->get('search');

        $posts = Post::published()
            ->with('category', 'user')
            ->when($category, fn($q) => $q->whereHas('category', fn($c) => $c->where('slug', $category)))
            ->when($search, fn($q) => $q->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('excerpt', 'like', "%{$search}%");
            }))
            ->latest('published_at')
            ->paginate(6);

        $categories = Category::withCount(['posts' => fn($q) => $q->published()])->get();

        return view('blog.index', compact('posts', 'categories', 'category', 'search'));
    }

    public function show($slug)
    {
        $post = Post::published()->where('slug', $slug)->with('category', 'user')->firstOrFail();
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn($q) => $q->where('category_id', $post->category_id))
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
