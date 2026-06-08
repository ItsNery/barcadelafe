<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::ordered()->paginate(20);
        $albums = GalleryImage::select('album')->distinct()->pluck('album');
        return view('admin.gallery.index', compact('images', 'albums'));
    }

    public function create()
    {
        return view('admin.gallery.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'required|image|max:4096',
            'album' => 'required|string|max:100',
            'order' => 'integer|min:0',
            'is_featured' => 'boolean',
        ]);

        $validated['image_path'] = $request->file('image')->store('gallery', 'public');
        $validated['is_featured'] = $request->boolean('is_featured');
        unset($validated['image']);

        GalleryImage::create($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Imagen agregada correctamente.');
    }

    public function edit(GalleryImage $gallery)
    {
        return view('admin.gallery.form', ['image' => $gallery]);
    }

    public function update(Request $request, GalleryImage $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'image' => 'nullable|image|max:4096',
            'album' => 'required|string|max:100',
            'order' => 'integer|min:0',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('gallery', 'public');
        }

        $validated['is_featured'] = $request->boolean('is_featured');
        unset($validated['image']);

        $gallery->update($validated);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Imagen actualizada correctamente.');
    }

    public function destroy(GalleryImage $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')
            ->with('success', 'Imagen eliminada correctamente.');
    }
}
