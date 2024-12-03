<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="{{route('retreat.update',$retreat->id)}}" method="POST">
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
<button type="submit">Créer une nouvelle retraite</button>
</body>
</html>