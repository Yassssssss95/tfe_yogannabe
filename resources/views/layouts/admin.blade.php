<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Yogannabe</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-logo">
                <img src="{{ asset('assets/Logo_fd_bleu.png') }}" alt="Yogannabe">
            </div>
            <nav class="sidebar-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.retreats.index') }}" class="{{ request()->routeIs('admin.retreats*') ? 'active' : '' }}">
    Retraites
</a>
                <a href="{{ route('admin.bookings') }}" class="{{ request()->routeIs('admin.bookings*') ? 'active' : '' }}">
                    Réservations
                </a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="admin-main">
            <div class="admin-header">
                <h1>@yield('title')</h1>
            </div>
            <div class="admin-content">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>