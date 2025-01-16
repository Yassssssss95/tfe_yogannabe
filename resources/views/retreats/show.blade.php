@extends('layouts.app')

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
            <h2>Planning</h2>
            <ul>
                <li>There are many variations</li>
                <li>Of passages of Lorem Ipsum available</li>
                <li>The majority have suffered</li>
                <li>Alteration in some form</li>
                <li>Hidden in the middle of text</li>
            </ul>
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
</div>
@endsection