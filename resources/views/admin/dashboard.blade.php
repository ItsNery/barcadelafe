@extends('layouts.admin')
@section('header', 'Dashboard')

@section('content')

{{-- Stats --}}
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon blue">📝</div>
        <div class="stat-info">
            <h3>{{ $stats['posts'] }}</h3>
            <p>Posts publicados</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon yellow">📋</div>
        <div class="stat-info">
            <h3>{{ $stats['drafts'] }}</h3>
            <p>Borradores</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">🖼️</div>
        <div class="stat-info">
            <h3>{{ $stats['images'] }}</h3>
            <p>Imágenes</p>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon red">📨</div>
        <div class="stat-info">
            <h3>{{ $stats['unread_messages'] }}</h3>
            <p>Mensajes sin leer</p>
        </div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
    {{-- Recent Posts --}}
    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3>Últimos Posts</h3>
            <a href="{{ route('admin.posts.create') }}" class="btn-admin btn-admin-primary btn-admin-sm">+ Nuevo</a>
        </div>
        @if($recentPosts->count())
            <table class="admin-table">
                <tbody>
                    @foreach($recentPosts as $post)
                        <tr>
                            <td>
                                <strong>{{ Str::limit($post->title, 35) }}</strong>
                                <br><small style="color: #94a3b8;">{{ $post->created_at->diffForHumans() }}</small>
                            </td>
                            <td>
                                <span class="badge {{ $post->is_published ? 'badge-success' : 'badge-warning' }}">
                                    {{ $post->is_published ? 'Publicado' : 'Borrador' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: #94a3b8; text-align: center; padding: 2rem;">No hay posts aún.</p>
        @endif
    </div>

    {{-- Recent Messages --}}
    <div class="admin-card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
            <h3>Últimos Mensajes</h3>
            <a href="{{ route('admin.contacts.index') }}" class="btn-admin btn-admin-outline btn-admin-sm">Ver todos</a>
        </div>
        @if($recentContacts->count())
            <table class="admin-table">
                <tbody>
                    @foreach($recentContacts as $contact)
                        <tr>
                            <td>
                                <strong>{{ $contact->name }}</strong>
                                <br><small style="color: #94a3b8;">{{ $contact->subject }}</small>
                            </td>
                            <td>
                                @if(!$contact->is_read)
                                    <span class="badge badge-danger">Nuevo</span>
                                @else
                                    <span class="badge badge-info">Leído</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="color: #94a3b8; text-align: center; padding: 2rem;">No hay mensajes aún.</p>
        @endif
    </div>
</div>

@endsection
