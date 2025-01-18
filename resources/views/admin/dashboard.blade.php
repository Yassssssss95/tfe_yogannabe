@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-stats">
    <div class="stat-card">
        <h3>Retraites actives</h3>
        <p class="stat-number">{{ $stats['activeRetreats'] }}</p>
    </div>
    <div class="stat-card">
        <h3>Réservations en attente</h3>
        <p class="stat-number">{{ $stats['pendingBookings'] }}</p>
    </div>
    <div class="stat-card">
        <h3>Clients inscrits</h3>
        <p class="stat-number">{{ $stats['registeredUsers'] }}</p>
    </div>
</div>
@endsection