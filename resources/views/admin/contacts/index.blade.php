@extends('layouts.admin')
@section('header', 'Mensajes de Contacto')

@section('content')

<div style="margin-bottom: 1.5rem;">
    <p style="color: #64748b;">{{ $contacts->total() }} mensajes</p>
</div>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>
                        @if(!$contact->is_read)
                            <span class="badge badge-danger">Nuevo</span>
                        @else
                            <span class="badge badge-info">Leído</span>
                        @endif
                    </td>
                    <td><strong>{{ $contact->name }}</strong></td>
                    <td style="font-size: 0.85rem;">{{ $contact->email }}</td>
                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                    <td style="font-size: 0.82rem; color: #64748b;">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="actions-cell">
                            @if(!$contact->is_read)
                                <form action="{{ route('admin.contacts.read', $contact) }}" method="POST">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="btn-admin btn-admin-outline btn-admin-sm">✅ Leído</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-admin btn-admin-danger btn-admin-sm">🗑️</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" style="padding: 0.5rem 1rem 1rem; background: #f8fafc; font-size: 0.9rem; color: #475569;">
                        {{ $contact->message }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #94a3b8; padding: 3rem;">No hay mensajes.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $contacts->links() }}
</div>

@endsection
