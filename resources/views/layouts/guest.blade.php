<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar__logo">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/Logo_fd_bleu.png') }}" alt="Yogannabe">
                </a>
            </div>
            <div class="navbar__links">
                <a href="{{ route('retreats.index') }}">Nos retraites</a>
            </div>
        </nav>

        <!-- Auth content -->
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <!-- Footer -->
        <footer class="footer">
            <!-- Votre footer existant -->
        </footer>
    </body>
</html>