
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
=======
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <p>Bienvenue dans l'interface d'administration</p>

</div>
@endsection