<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('retreat.create')}}">Create a retreat</a>
@foreach($retreats as $retreat)
<ul>
    <li>Name: {{$retreat->name}}</li>
    <li>Starting date: {{$retreat->starting_date}}</li>
    <li>Ending date: {{$retreat->ending_date}}</li>
    <li>Description: {{$retreat->description}}</li>
    <li>Price: {{$retreat->price}}</li>
    <li>Number places: {{$retreat->number_places}}</li>
    <li>address: {{address}}</li>
</ul>
<a href="{{route('retreat.show',$retreat->id)}}">Show</a>
<a href="{{route('retreat.edit',$retreat->id)}}">Edit</a>
<form action="{{route('retreat.delete',$retreat->id)" method="POST">

@csrf

@methode('DELETE')
    <button type="submit">Delete</button>

</form>
@endforeach
</body>
</html>