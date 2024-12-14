<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

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
</body>
</html>