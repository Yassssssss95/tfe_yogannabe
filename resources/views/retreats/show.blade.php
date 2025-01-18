@extends('layouts.app')

@section('head')
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP') }}"></script>
<script>
function initMap() {
    const location = {
        lat: parseFloat('{{ $retreat->latitude }}'),
        lng: parseFloat('{{ $retreat->longitude }}')
    };

    const map = new google.maps.Map(document.getElementById('retreat-map'), {
        zoom: 15,
        center: location,
    });

    const marker = new google.maps.Marker({
        position: location,
        map: map,
        title: '{{ $retreat->name }}'
    });
}

document.addEventListener('DOMContentLoaded', initMap);
</script>
@endsection

@section('content')
<div class="retreat-details">
    <div class="retreat-header">
        <a href="{{ route('booking.form') }}" class="btn-booking">Réserver</a>
    </div>

    <div class="retreat-section">
        <div class="retreat-main">
            <h1>{{ $retreat->name }}</h1>
            <div class="retreat-dates">
                Du {{ \Carbon\Carbon::parse($retreat->starting_date)->translatedFormat('j F Y') }} 
                au {{ \Carbon\Carbon::parse($retreat->ending_date)->translatedFormat('j F Y') }}
            </div>
            <div class="retreat-description">
                {{ $retreat->description }}
            </div>
        </div>
        <div class="retreat-image">
            @php
                $images = explode(',', $retreat->image_path);
                $firstImage = !empty($images[0]) ? $images[0] : null;
            @endphp
            @if($firstImage)
                <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $retreat->name }}">
            @endif
        </div>
    </div>

    <div class="retreat-section">
        @php
            $secondImage = !empty($images[1]) ? $images[1] : null;
        @endphp
        @if($secondImage)
            <div class="retreat-image">
                <img src="{{ asset('storage/' . $secondImage) }}" alt="{{ $retreat->name }}">
            </div>
        @endif
        <div class="retreat-planning">
            <h2>Programme</h2>
            
                <li>Pratiques de yoga adaptées à tous niveaux</li>
                <li>Méditations guidées au lever du soleil</li>
                <li>Ateliers de respiration et de pleine conscience</li>
                <li>Découverte de la culture irlandaise</li>
                <li>Randonnées dans des paysages à couper le souffle</li>
            
            <h2>Inclus</h2>
            
            <li>Hébergement en chambre partagée ou individuelle</li>
                <li>Tous les cours de yoga</li>
                <li>Repas végétariens bio</li>
                <li>Activités culturelles</li>
                <li>Randonnées accompagnées</li>
                
        </div>
    </div>

    <div class="retreat-section">
        <div class="retreat-booking">
            <div class="price">Prix: {{ $retreat->price }}€</div>
            <div class="places">Reste {{ $retreat->number_places }} places</div>
            <a href="{{ route('booking.form') }}" class="btn-booking">Réserver</a>
        </div>
        @php
            $thirdImage = !empty($images[2]) ? $images[2] : null;
        @endphp
        @if($thirdImage)
            <div class="retreat-image">
                <img src="{{ asset('storage/' . $thirdImage) }}" alt="{{ $retreat->name }}">
            </div>
        @endif
    </div>

    <div class="retreat-map-section">
        <h2>Localisation</h2>
        <div id="retreat-map"></div>
    </div>
</div>
@endsection