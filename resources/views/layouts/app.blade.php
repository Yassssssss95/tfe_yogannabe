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
            <img src="{{ asset('assets/icone.png') }}" alt="Yogannabe">
        </a>
    </div>
    <div class="navbar__links">
        <a href="{{ route('retreats.index') }}">Nos retraites</a>
        <a href="{{ route('booking.form') }}">Réserver une retraite</a>
        <a href="{{ route('login') }}">Se connecter</a>
        <a href="{{ route('register') }}" class="btn-signup">S'inscrire</a>
    </div>
</nav>

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
      <p>Adresse : 123 rue du Yoga, Dublin, Irlande</p>
      <p>Téléphone : (+81) 80-6817-9220</p>
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
</body>
</html>