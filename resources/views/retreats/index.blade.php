@extends('layouts.app')

@section('content')
<div class="retreats-list">
    <div class="retreats-header">
        <a href="{{ route('booking.form') }}" class="btn-booking">Réserver</a>
    </div>
    
    @foreach($retreats as $retreat)
    <div class="retreat-card">
        <div class="retreat-info">
            <h2>{{ $retreat->name }}</h2>
            <div class="retreat-dates">
    Du {{ \Carbon\Carbon::parse($retreat->starting_date)->translatedFormat('j F Y') }} 
    au {{ \Carbon\Carbon::parse($retreat->ending_date)->translatedFormat('j F Y') }}
</div>
            <div class="retreat-description">
                {{ Str::limit($retreat->description, 200) }}
            </div>
            <div class="retreat-places">
                Reste {{ $retreat->number_places }} places
            </div>
            <a href="{{ route('retreats.show', $retreat->id) }}" class="btn-more">En savoir plus</a>
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
    @endforeach
</div>
@endsection