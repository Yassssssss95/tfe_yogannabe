@extends('layouts.app')

@section('content')
<div class="content">
<section class="hero" style="background-image: url('{{ asset('assets/irl7.jpg') }}')">
<div class="hero__intro">
        <h1>Bienvenue sur Yogannabe</h1>
        <p>Découvrez la paix intérieure au cœur de l'Irlande</p>
    </div>
    <div class="hero__cta">
        <a href="{{ route('retreat.index') }}" class="btn btn-cta">Voir nos séjours</a>
    </div>
</section>

<section class="presentation">
    <div class="presentation__content">
        <h1>Yogannabe</h1>
        <p>est bien plus qu'un simple projet, c'est un voyage, une rencontre entre la pratique du yoga et la beauté brute de l'Irlande.</br> Tout a commencé lors de mon voyage en Irlande, un coup de cœur pour ses paysages à couper le souffle, la sérénité de ses espaces naturels, et la chaleur de ses habitants. Ces moments d’évasion m’ont inspirée à offrir à mes élèves un cadre unique, propice à la détente et au ressourcement.</br>
        En tant que professeure de Viniyoga depuis plus de 10 ans, j’ai toujours eu à cœur de proposer des pratiques adaptées, permettant à chacun de se reconnecter à soi-même. </br> Avec Yogannabe, l’idée est simple : vous inviter à vivre des retraites immersives dans des lieux magiques d’Irlande, où la nature, le calme et l’authenticité se mêlent harmonieusement. Que vous soyez débutant ou pratiquant confirmé, ces retraites sont une occasion parfaite de ralentir, de vous ressourcer et de découvrir l’essence même du yoga, tout en vous imprégnant de la beauté irlandaise.

Rejoignez-moi pour une aventure inoubliable, où le yoga et la nature se rencontrent pour créer une expérience unique.</p>
    </div>
    <div class="presentation__cta">
        <a href="{{ route('booking.form') }}" class="btn btn-booking">Réserver une retraite</a>
    </div>
</section>

<section class="features">
    <div class="features__grid">
        <div class="feature">
            <img src="{{ asset('assets/asana_logo.png') }}" alt="Asana">
            <h3>Asana</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('assets/prana_logo.png') }}" alt="Pranayama">
            <h3>Pranayama</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('assets/meditation_logo.png') }}" alt="Meditation">
            <h3>Meditation</h3>
        </div>
        <div class="feature">
            <img src="{{ asset('assets/chant_logo.png') }}" alt="Chant védique">
            <h3>Chant védique</h3>
        </div>
    </div>
</section>
</div>
@endsection