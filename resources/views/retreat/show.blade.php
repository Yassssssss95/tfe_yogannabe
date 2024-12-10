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

</ul>
<img src="{{ asset('/assets/./'.$retreat->picture) }}" />
</body>
</html>