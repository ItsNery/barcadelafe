<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $album = $request->get('album');
        $albums = GalleryImage::select('album')->distinct()->pluck('album');

        $images = GalleryImage::ordered()
            ->when($album, fn($q) => $q->byAlbum($album))
            ->paginate(12);

        return view('gallery', compact('images', 'albums', 'album'));
    }
}
