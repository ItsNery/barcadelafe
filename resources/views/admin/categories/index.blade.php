@extends('layouts.admin')
@section('header', 'Categorías')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <p style="color: #64748b;">{{ $categories->count() }} categorías</p>
    <a href="{{ route('admin.categories.create') }}" class="btn-admin btn-admin-primary">+ Nueva Categoría</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Posts</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td><strong>{{ $category->name }}</strong></td>
                    <td style="color: #64748b; font-size: 0.85rem;">{{ $category->slug }}</td>
                    <td><span class="badge badge-info">{{ $category->posts_count }}</span></td>
                    <td>
                        <div class="actions-cell">
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn-admin btn-admin-outline btn-admin-sm">✏️ Editar</a>
                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Eliminar esta categoría?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #94a3b8; padding: 3rem;">No hay categorías.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
