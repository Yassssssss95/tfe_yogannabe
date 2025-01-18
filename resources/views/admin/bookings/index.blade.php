@extends('layouts.admin')

@section('title', 'Gestion des réservations')

@section('content')
<div class="admin-bookings">
    <div class="bookings-table">
        <table>
            <thead>
                <tr>
                    <th>Date de réservation</th>
                    <th>Retraite</th>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->created_at->format('d/m/Y') }}</td>
                        <td>
                            {{ $booking->retreat->name }}<br>
                            <small>Du {{ \Carbon\Carbon::parse($booking->retreat->starting_date)->format('d/m/Y') }}
                            au {{ \Carbon\Carbon::parse($booking->retreat->ending_date)->format('d/m/Y') }}</small>
                        </td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->user->email }}</td>
                        <td>{{ $booking->message ?? '-' }}</td>
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
                        <td class="actions">
                            @if($booking->status === 'pending')
                                <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn-confirm">Confirmer</button>
                                </form>
                                <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn-cancel">Annuler</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection