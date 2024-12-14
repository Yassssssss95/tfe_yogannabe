@extends('layouts.app')

@section('title', 'Détails des retraites')

@section('content')

    <a href="{{route('retreat.create')}}" wire:navigate>Create a retreat</a>
@foreach($retreats as $retreat)
<ul>
    <li>Name: {{$retreat->name}}</li>
    <li>Starting date: {{$retreat->starting_date}}</li>
    <li>Ending date: {{$retreat->ending_date}}</li>
    <li>Description: {{$retreat->description}}</li>
    <li>Price: {{$retreat->price}}</li>
    <li>Number places: {{$retreat->number_places}}</li>
    <li>address: {{$retreat->address}}</li>
    <li>longitude: {{$retreat->longitude}}</li>
    <li>latitude: {{$retreat->latitude}}</li>
    <img src="{{ asset('/storage/./'.$retreat->image_path) }}"/>
</ul>
<a href="{{route('retreat.show',$retreat->id)}}">Show</a>
<a href="{{route('retreat.edit',$retreat->id)}}">Edit</a>

<form action="{{route('retreat.delete',$retreat->id)}}" method="POST">
@csrf
@method('DELETE')
    <button type="submit">Delete</button>

</form>
@endforeach

@endsection

