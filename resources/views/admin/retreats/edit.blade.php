@extends('layouts.admin')

@section('title', 'Modifier une retraite')

@section('head')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP') }}&libraries=places&callback=initialize" async defer></script>
<script type="text/javascript" src="{{ asset('js/mapinput.js') }}"></script>
@endsection

@section('content')
<div class="admin-header">
    <h2>Modifier une retraite</h2>
    <a href="{{ route('admin.retreats.index') }}" class="btn-secondary">Retour à la liste</a>
</div>

<div class="admin-form">
    <form action="{{ route('admin.retreats.update', $retreat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom de la retraite</label>
            <input type="text" id="name" name="name" value="{{ $retreat->name }}" required>
        </div>

    <div class="form-row">
        <div class="form-group">
            <label for="starting_date">Date de début</label>
            <input type="date" id="starting_date" name="starting_date" value="{{ $retreat->starting_date }}" required>
        </div>

        <div class="form-group">
            <label for="ending_date">Date de fin</label>
            <input type="date" id="ending_date" name="ending_date" value="{{ $retreat->ending_date }}" required>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5" required>{{ $retreat->description }}</textarea>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="number_places">Nombre de places</label>
            <input type="number" id="number_places" name="number_places" value="{{ $retreat->number_places }}" required>
        </div>

        <div class="form-group">
            <label for="price">Prix</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ $retreat->price }}" required>
        </div>
    </div>

  
    <div class="form-group">
    <label for="address-input">Adresse</label>
    <input type="text" class="form-control map-input" id="address-input" value="{{ $retreat->address }}">
    <input type="hidden" name="address" id="address" value="{{ $retreat->address }}" required>
</div>

        <div id="address-map-container">
            <div id="address-map"></div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" id="address-latitude" name="latitude" value="{{ $retreat->latitude }}" readonly required>
            </div>

            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" id="address-longitude" name="longitude" value="{{ $retreat->longitude }}" readonly required>
            </div>
        </div>

    <div class="form-group">
        <label for="image">Images (sélectionnez une ou plusieurs images)</label>
        <input type="file" id="image" name="images[]" multiple accept="image/*">
        @if($retreat->image_path)
            <div class="current-images">
                <p>Images actuelles :</p>
                @foreach(explode(',', $retreat->image_path) as $image)
                    <img src="{{ asset('storage/' . $image) }}" alt="Image retraite" style="max-width: 100px; margin: 10px;">
                @endforeach
            </div>
        @endif
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Modifier la retraite</button>
    </div>
</form>
</div>
@endsection