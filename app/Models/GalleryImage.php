<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image_path',
        'album', 'order', 'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByAlbum($query, $album)
    {
        return $query->where('album', $album);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
