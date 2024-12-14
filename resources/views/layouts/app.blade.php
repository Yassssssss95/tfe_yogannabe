<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yogannabe')</title>
    @livewireStyles
    <!-- Inclure des styles ou des scripts globaux ici -->
</head>
<body>
<header>
    <h1> Menu de navigation </h1>
    <nav>
        <ul>
            
            <li><a href="{{ route('maps') }}" wire:navigate>Cartes</a></li>
            <li><a href="{{ route('retreat.index') }}" wire:navigate>Nos retraites</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>Copyright © 2024. Tous droits réservés.</p>
</footer>
@livewireScripts
</body>
</html>