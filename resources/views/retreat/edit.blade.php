<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="{{route('retreat.update',$retreat->id)}}" method="POST" enctype="multipart/form-data">
    @csrf 
    @method('PUT')
    <div>
    <label for="name">Name: </label>
    <input type="text" id="name" name="name">
</div>
<div>
    <label for="starting_date">Starting date: </label>
    <input type="date" id="starting_date" name="starting_date">
</div>
<div>
    <label for="ending_date">Ending date: </label>
    <input type="date" id="ending_date" name="ending_date">
</div>
<div>
    <label for="description">Description: </label>
    <input type="text" id="description" name="description">
</div>
<div>
    <label for="number_places">Number of places: </label>
    <input type="number" id="number_places" name="number_places">
</div>
<div>
    <label for="price">Price: </label>
    <input type="number" id="price" name="price">
</div>
<div>
    <label for="address">Address: </label>
    <input type="text" id="address" name="address">
</div>
<div>
    <label for="longitude">longitude:</label>
    <input type="text" id="longitude" name="longitude">
</div>
<div>
    <label for="latitude">latitude:</label>
    <input type="text" id="latitude" name="latitude">
</div>
<div>
    <label for="image">image: </label>
    <input type="file" id="image" name="image">
</div>
<button type="submit">modifier  retraite</button>
</body>
</html>