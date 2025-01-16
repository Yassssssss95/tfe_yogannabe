@extends('layouts.admin')

@section('title', 'Ajouter une retraite')

@section('head')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP') }}&libraries=places&callback=initialize" async defer></script>
<script type="text/javascript" src="{{ asset('js/mapinput.js') }}"></script>
@endsection

@section('content')
<div class="admin-header">
    <h2>Ajouter une nouvelle retraite</h2>
    <a href="{{ route('admin.retreats.index') }}" class="btn-secondary">Retour à la liste</a></div>

<div class="admin-form">
<form action="{{ route('admin.retreats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Nom de la retraite</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="starting_date">Date de début</label>
                <input type="date" id="starting_date" name="starting_date" required>
            </div>

            <div class="form-group">
                <label for="ending_date">Date de fin</label>
                <input type="date" id="ending_date" name="ending_date" required>
            </div>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="number_places">Nombre de places</label>
                <input type="number" id="number_places" name="number_places" required>
            </div>

            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" id="price" name="price" step="0.01" required>
            </div>
        </div>

        <div class="form-group">
    <label for="address-input">Adresse</label>
    <input type="text" class="form-control map-input" id="address-input" required>
</div>

<div id="address-map-container">
    <div id="address-map"></div>
</div>

<div class="form-row">
    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input type="text" id="address-latitude" name="latitude" readonly required>
    </div>

    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input type="text" id="address-longitude" name="longitude" readonly required>
    </div>
</div>

        <div class="form-group">
    <label for="image">Images (sélectionnez une ou plusieurs images)</label>
    <input type="file" id="image" name="images[]" multiple accept="image/*">
</div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Créer la retraite</button>
        </div>
    </form>
</div>
@endsection