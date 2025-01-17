@extends('layouts.app')

@section('content')
<div class="booking-form">
    <h1>Réserver votre retraite</h1>
    <p>Vous souhaitez participer à une des nos retraites?  
    Veuillez remplir ce formulaire, nous vous répondrons et vous confirmerons votre inscription dans les plus brefs délais.</br>
     N'hésitez pas à laissez un message si vous avez des questions ou des remarques.</p>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        
        <div class="form-section">
    
    <p>Réservé en tant que : {{ auth()->user()->name }}</p>
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    
    <div class="form-group">
    <label for="retreat_id">Choisissez votre retraite*</label>
    <select name="retreat_id" id="retreat_id" required>
        @foreach($retreats as $retreat)
            <option value="{{ $retreat->id }}">
                {{ $retreat->name }} - 
                Du {{ \Carbon\Carbon::parse($retreat->starting_date)->translatedFormat('j F Y') }}
                au {{ \Carbon\Carbon::parse($retreat->ending_date)->translatedFormat('j F Y') }}
                ({{ $retreat->price }}€) - 
                {{ $retreat->number_places }} places disponibles
            </option>
        @endforeach
    </select>
</div>
    <!-- Message optionnel -->
    <div class="form-group">
        <label for="message">Message (optionnel)</label>
        <textarea name="message" id="message" rows="5"></textarea>
    </div>
</div>
       

        

        <button type="submit">Réserver</button>
    </form>
</div>
@endsection