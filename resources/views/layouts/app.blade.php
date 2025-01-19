<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Yogannabe</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @yield('head')
</head>
<body>
<nav class="navbar">
    <div class="navbar__logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/Logo_fd_bleu.png') }}" alt="Yogannabe">
        </a>
    </div>
    
    <div class="navbar__burger">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="navbar__links">
        <a href="{{ route('retreats.index') }}">Nos retraites</a>
        
        @guest
            {{-- Pour les visiteurs non connectés --}}
            <a href="{{ route('login') }}">Se connecter</a>
            <a href="{{ route('register') }}" class="btn-signup">S'inscrire</a>
        @else
            {{-- Pour les utilisateurs connectés --}}
            <a href="{{ route('booking.form') }}">Réserver une retraite</a>
            <a href="{{ route('my-bookings') }}">Mes réservations</a>
            
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">Mon dashboard</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="btn-logout">Se déconnecter</button>
            </form>
        @endguest
    </div>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

@auth
    @if(request()->is('/'))
        <div class="welcome-message">
            Bienvenue {{ auth()->user()->name }} !
        </div>
    @endif
@endauth
    <main>
        @yield('content')
    </main>

    <footer class="footer">
  <div class="footer__content">
    <div class="footer__section about">
      <h3>À propos</h3>
      <p>Yogannabe propose des retraites de yoga uniques en Irlande pour vous ressourcer et vous reconnecter à vous-même.</p>
    </div>
    <div class="footer__section links">
      <h3>Liens utiles</h3>
      <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">Nos retraites</a></li>
        <li><a href="#">Témoignages</a></li>
        <li><a href="#">Réserver</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="footer__section contact">
      <h3>Contact</h3>
      <p>Yogannabe</p>
      <p>Adresse : 123 rue du Yoga, Bruxelles, Belgique</p>
      <p>Téléphone : (+32) 477-54-59-28</p>
      <p>Email : <a href="mailto:yogannabe@gmail.com">yogannabe@gmail.com</a></p>
    </div>
    <div class="footer__section social">
      <h3>Suivez-nous</h3>
      <ul class="social-icons">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="footer__bottom">
    <p>&copy; 2024 Yogannabe. Tous droits réservés.</p>
    <a href="#">Mentions légales</a>
    <a href="#">Politique de confidentialité</a>
  </div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const burger = document.querySelector('.navbar__burger');
        const navLinks = document.querySelector('.navbar__links');

        burger.addEventListener('click', () => {
            // Toggle des classes pour l'animation
            burger.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        // Fermer le menu quand on clique sur un lien
        const links = document.querySelectorAll('.navbar__links a, .navbar__links .logout-form button');
        links.forEach(link => {
            link.addEventListener('click', () => {
                burger.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });
    });
</script>
</body>
</html>