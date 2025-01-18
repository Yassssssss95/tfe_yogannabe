@extends('layouts.admin')

@section('title', $retreat->name)

@section('content')
<div class="retreat-details">
    <div class="retreat-info">
        <div class="info-section">
            <h2>Informations</h2>
            <div class="info-grid">
                <div class="info-item">
                    <label>Dates</label>
                    <p>Du {{ \Carbon\Carbon::parse($retreat->starting_date)->translatedFormat('j F Y') }}
                    au {{ \Carbon\Carbon::parse($retreat->ending_date)->translatedFormat('j F Y') }}</p>
                </div>
                <div class="info-item">
                    <label>Places</label>
                    <p>{{ $retreat->number_places }} places disponibles</p>
                </div>
                <div class="info-item">
                    <label>Prix</label>
                    <p>{{ $retreat->price }}€</p>
                </div>
                <div class="info-item">
                    <label>Adresse</label>
                    <p>{{ $retreat->address }}</p>
                </div>
            </div>
            <div class="info-description">
                <label>Description</label>
                <p>{{ $retreat->description }}</p>
            </div>
        </div>

        <div class="participants-section">
            <h2>Participants</h2>
            <div class="participants-table">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Date d'inscription</th>
                            <th>Statut</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($retreat->bookings as $booking)
                            <tr>
                                <td>{{ $booking->user->name }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <span class="status status-{{ $booking->status }}">
                                        @if($booking->status === 'pending')
                                            En attente
                                        @elseif($booking->status === 'confirmed')
                                            Confirmée
                                        @else
                                            Annulée
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $booking->message ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection