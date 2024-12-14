<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="{{route('customer.store')}}" method="POST">
    @csrf 
    @method('POST')
<div>
    <label for="lastname">lastname: </label>
    <input type="text" id="lastname" name="lastname">
</div>
<div>
    <label for="firstname">Firstname: </label>
    <input type="text" id="firstname" name="firstname">
</div>
<div>
    <label for="age">Age: </label>
    <input type="number" id="age" name="age">
</div>
<div>
    <label for="message">Message: </label>
    <input type="text" id="message" name="message">
</div>

<button type="submit">Create a new customer</button>
</body>
</html>