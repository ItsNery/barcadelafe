<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — @yield('title', 'La Barca de la Fe')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --admin-primary: #1a365d;
            --admin-secondary: #c6923a;
            --admin-bg: #f1f5f9;
            --admin-sidebar: #0f1b2d;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: var(--admin-bg);
            color: #1e293b;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 260px;
            background: var(--admin-sidebar);
            color: white;
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 100;
        }

        .admin-sidebar .sidebar-brand {
            padding: 0 1.5rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 1rem;
        }

        .admin-sidebar .sidebar-brand a {
            color: var(--admin-secondary);
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .admin-sidebar .sidebar-brand small {
            display: block;
            color: rgba(255,255,255,0.5);
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .sidebar-nav {
            list-style: none;
            padding: 0 0.75rem;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.7rem 1rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.2s;
            margin-bottom: 2px;
        }

        .sidebar-nav li a:hover,
        .sidebar-nav li a.active {
            background: rgba(198, 146, 58, 0.15);
            color: var(--admin-secondary);
        }

        .sidebar-nav li a .nav-icon {
            font-size: 1.1rem;
            width: 24px;
            text-align: center;
        }

        .sidebar-nav .nav-section {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.3);
            padding: 1rem 1rem 0.5rem;
        }

        /* Main Content */
        .admin-main {
            flex: 1;
            margin-left: 260px;
            padding: 0;
        }

        .admin-header {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .admin-header h1 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
        }

        .admin-header .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-header .header-actions a {
            font-size: 0.85rem;
            color: #64748b;
            text-decoration: none;
        }

        .admin-header .header-actions a:hover {
            color: var(--admin-primary);
        }

        .admin-body {
            padding: 2rem;
        }

        /* Admin components */
        .admin-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .admin-card h3 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #334155;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-card .stat-icon.blue { background: #dbeafe; }
        .stat-card .stat-icon.yellow { background: #fef3c7; }
        .stat-card .stat-icon.green { background: #dcfce7; }
        .stat-card .stat-icon.red { background: #fee2e2; }

        .stat-card .stat-info h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0;
        }

        .stat-card .stat-info p {
            font-size: 0.82rem;
            color: #64748b;
        }

        /* Admin Table */
        .admin-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .admin-table th {
            text-align: left;
            padding: 0.75rem 1rem;
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
            border-bottom: 2px solid #e2e8f0;
        }

        .admin-table td {
            padding: 0.85rem 1rem;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .admin-table tr:hover td {
            background: #f8fafc;
        }

        .admin-table .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success { background: #dcfce7; color: #166534; }
        .badge-warning { background: #fef3c7; color: #92400e; }
        .badge-danger { background: #fee2e2; color: #991b1b; }
        .badge-info { background: #dbeafe; color: #1e40af; }

        /* Admin Buttons */
        .btn-admin {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s;
        }

        .btn-admin-primary {
            background: var(--admin-primary);
            color: white;
        }
        .btn-admin-primary:hover {
            background: #2a4a7f;
            color: white;
        }

        .btn-admin-secondary {
            background: var(--admin-secondary);
            color: white;
        }

        .btn-admin-danger {
            background: #ef4444;
            color: white;
        }
        .btn-admin-danger:hover { background: #dc2626; }

        .btn-admin-sm {
            padding: 0.35rem 0.75rem;
            font-size: 0.8rem;
        }

        .btn-admin-outline {
            background: transparent;
            border: 1px solid #e2e8f0;
            color: #64748b;
        }
        .btn-admin-outline:hover {
            border-color: var(--admin-primary);
            color: var(--admin-primary);
        }

        /* Admin Forms */
        .admin-form .form-group {
            margin-bottom: 1.25rem;
        }

        .admin-form label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
            font-size: 0.87rem;
            color: #374151;
        }

        .admin-form input[type="text"],
        .admin-form input[type="email"],
        .admin-form input[type="number"],
        .admin-form input[type="url"],
        .admin-form select,
        .admin-form textarea {
            width: 100%;
            padding: 0.6rem 0.9rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.9rem;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .admin-form input:focus,
        .admin-form select:focus,
        .admin-form textarea:focus {
            border-color: var(--admin-secondary);
            box-shadow: 0 0 0 3px rgba(198, 146, 58, 0.15);
        }

        .admin-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .admin-form .form-error {
            color: #ef4444;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }

        .admin-form .form-check {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .admin-form .form-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--admin-secondary);
        }

        /* Alerts */
        .admin-alert {
            padding: 0.75rem 1.25rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .admin-alert-success {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #166534;
        }

        .actions-cell {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .admin-sidebar { display: none; }
            .admin-main { margin-left: 0; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        {{-- Sidebar --}}
        <aside class="admin-sidebar">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}">⛵ La Barca de la Fe</a>
                <small>Panel de Administración</small>
            </div>

            <ul class="sidebar-nav">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="nav-icon">📊</span> Dashboard
                    </a>
                </li>

                <li class="nav-section">Contenido</li>
                <li>
                    <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <span class="nav-icon">✏️</span> Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <span class="nav-icon">🏷️</span> Categorías
                    </a>
                </li>

                <li class="nav-section">Media</li>
                <li>
                    <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                        <span class="nav-icon">🖼️</span> Galería
                    </a>
                </li>

                <li class="nav-section">Interacción</li>
                <li>
                    <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                        <span class="nav-icon">📨</span> Mensajes
                        @php $unread = \App\Models\Contact::unread()->count(); @endphp
                        @if($unread > 0)
                            <span class="badge badge-danger" style="margin-left: auto;">{{ $unread }}</span>
                        @endif
                    </a>
                </li>

                <li class="nav-section">Sistema</li>
                <li>
                    <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <span class="nav-icon">⚙️</span> Configuración
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                        <span class="nav-icon">👤</span> Mi Perfil
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        <span class="nav-icon">🌐</span> Ver Sitio
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            <span class="nav-icon">🚪</span> Cerrar Sesión
                        </a>
                    </form>
                </li>
            </ul>
        </aside>

        {{-- Main --}}
        <div class="admin-main">
            <header class="admin-header">
                <h1>@yield('header', 'Dashboard')</h1>
                <div class="header-actions">
                    <span>👋 {{ auth()->user()->name }}</span>
                    <a href="{{ route('home') }}" target="_blank">Ver sitio →</a>
                </div>
            </header>

            <div class="admin-body">
                @if(session('success'))
                    <div class="admin-alert admin-alert-success">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
