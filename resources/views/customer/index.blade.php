<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{route('customer.create')}}">Add a customer</a>
@foreach($customers as $customer)
<ul>
    <li>Lastname: {{$customer->lastname}}</li>
    <li>Firstname: {{$customer->firstname}}</li>
    <li>Age: {{$customer->age}}</li>
    <li>Message: {{$customer->message}}</li>
    <li>Price: {{$customer->price}}</li>
    
</ul>
<a href="{{route('customer.show',$customer->id)}}">Show</a>
<a href="{{route('customer.edit',$customer->id)}}">Edit</a>
<form action="{{route('customer.delete',$customer->id)" method="POST">

@csrf

@methode('DELETE')
    <button type="submit">Delete</button>

</form>
@endforeach
</body>
</html>