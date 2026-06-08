@extends('layouts.admin')
@section('header', 'Galería')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <p style="color: #64748b;">{{ $images->total() }} imágenes</p>
    <a href="{{ route('admin.gallery.create') }}" class="btn-admin btn-admin-primary">+ Nueva Imagen</a>
</div>

<div class="admin-card">
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem;">
        @forelse($images as $image)
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                <div style="aspect-ratio: 4/3; overflow: hidden;">
                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title }}"
                         style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="padding: 0.75rem;">
                    <strong style="font-size: 0.85rem;">{{ Str::limit($image->title, 25) }}</strong>
                    <div style="font-size: 0.75rem; color: #94a3b8; margin-top: 0.25rem;">
                        {{ ucfirst($image->album) }}
                        @if($image->is_featured) · ⭐ Destacada @endif
                    </div>
                    <div style="display: flex; gap: 0.4rem; margin-top: 0.5rem;">
                        <a href="{{ route('admin.gallery.edit', $image) }}" class="btn-admin btn-admin-outline btn-admin-sm" style="font-size: 0.75rem;">✏️</a>
                        <form action="{{ route('admin.gallery.destroy', $image) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm" style="font-size: 0.75rem;">🗑️</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 3rem; color: #94a3b8;">
                <p style="font-size: 2rem;">🖼️</p>
                <p>No hay imágenes. ¡Agrega la primera!</p>
            </div>
        @endforelse
    </div>
</div>

<div class="pagination">
    {{ $images->links() }}
</div>

@endsection
