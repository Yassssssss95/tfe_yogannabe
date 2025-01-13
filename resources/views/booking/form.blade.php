@extends('layouts.app')

@section('content')
<div class="booking-form">
    <h1>Réserver votre retraite</h1>
    
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="retreat_id">Choisissez votre retraite*</label>
            <select name="retreat_id" id="retreat_id" required>
                @foreach($retreats as $retreat)
                    <option value="{{ $retreat->id }}">{{ $retreat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="message">Message (optionnel)</label>
            <textarea name="message" id="message" rows="5"></textarea>
        </div>

        <button type="submit">Réserver</button>
    </form>
</div>
@endsection