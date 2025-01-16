@extends('layouts.admin')

@section('title', 'Ajouter une retraite')

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
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" required>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" id="longitude" name="longitude" required>
            </div>

            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" id="latitude" name="latitude" required>
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