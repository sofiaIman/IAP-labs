<!DOCTYPE html>
<html>
<head>
    <title>Car</title>
</head>

<body>
    
    @foreach($cars as $car)
    <ul>
        <img src="{{Storage::url($car->image)}}" alt="">
        <li>{{$car->make}}  {{$car->model}}  {{$car->produced_on}}</li>
        </ul>
    @endforeach
    

</body>

</html>