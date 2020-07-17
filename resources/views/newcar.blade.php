<!DOCTYPE html>
<html>

<head>
    <title>Car</title>
</head>

<body>

    @if(Session::has('form_status'))
        {{session('form_status')}}
    @endif
    @if(count($errors))
        @foreach($errors->all() as $error)
            <li>{{$error}} </li>
        @endforeach
    @endif
    <form action="/car" method="POST" enctype="multipart/form-data" >
        @csrf
        Make: <input type="text" required name="make" value = "{{ old('make') }}"> <br>
        Model: <input type="text" required name="model"> <br>
        Date produced: <input type="date" required name="produced_on"> <br>
        Image: <input type="file" required name="image"> <br>
       
        <input type="submit" value="Save"> <br>
        
        

    </form>


</body>

</html>