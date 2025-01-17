@extends('layouts.app')

@section('content')
<div class="my-bookings">
    <h1>Mes réservations</h1>

    @if($bookings->isEmpty())
        <p>Vous n'avez pas encore de réservation.</p>
    @else
        <div class="bookings-list">
            @foreach($bookings as $booking)
                <div class="booking-card">
                    <div class="booking-header">
                        <h2>{{ $booking->retreat->name }}</h2>
                        <span class="status status-{{ $booking->status }}">
                            @if($booking->status === 'pending')
                                En attente
                            @elseif($booking->status === 'confirmed')
                                Confirmée
                            @else
                                Annulée
                            @endif
                        </span>
                    </div>
                    
                    <div class="booking-details">
                        <p class="dates">
                            Du {{ \Carbon\Carbon::parse($booking->retreat->starting_date)->translatedFormat('j F Y') }}
                            au {{ \Carbon\Carbon::parse($booking->retreat->ending_date)->translatedFormat('j F Y') }}
                        </p>
                        <p class="price">Prix : {{ $booking->retreat->price }}€</p>
                        @if($booking->message)
                            <p class="message">Message : {{ $booking->message }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection