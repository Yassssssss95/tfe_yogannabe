@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-stats">
    <div class="stat-card">
        <h3>Retraites actives</h3>
        <p class="stat-number">5</p>
    </div>
    <div class="stat-card">
        <h3>Réservations en attente</h3>
        <p class="stat-number">12</p>
    </div>
    <div class="stat-card">
        <h3>Clients inscrits</h3>
        <p class="stat-number">45</p>
    </div>
</div>
@endsection