@extends('layouts.admin')
@section('header', 'Posts')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <p style="color: #64748b;">{{ $posts->total() }} posts en total</p>
    <a href="{{ route('admin.posts.create') }}" class="btn-admin btn-admin-primary">+ Nuevo Post</a>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Categoría</th>
                <th>Estado</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td><strong>{{ Str::limit($post->title, 45) }}</strong></td>
                    <td>{{ $post->category?->name ?? '—' }}</td>
                    <td>
                        <span class="badge {{ $post->is_published ? 'badge-success' : 'badge-warning' }}">
                            {{ $post->is_published ? 'Publicado' : 'Borrador' }}
                        </span>
                    </td>
                    <td style="font-size: 0.82rem; color: #64748b;">{{ $post->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions-cell">
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn-admin btn-admin-outline btn-admin-sm">✏️ Editar</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Eliminar este post?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #94a3b8; padding: 3rem;">No hay posts aún.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $posts->links() }}
</div>

@endsection
