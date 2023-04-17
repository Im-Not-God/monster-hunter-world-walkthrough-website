<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weapon Details</title>
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <style>
        /* .monster a {
            color: rgba(255, 255, 255, 1);
        } */
    </style>

    @extends('layouts.navigation')
    @section('content')
    <div class="d-flex">
        <div>
            @include('sideNav')
        </div>
        <div class="container">

            <h1>Large Monsters</h1>
            <div class="row">
                @foreach($data1 as $result)
                <div class="col-sm-2 text-center monster">
                    <img src="/img/monster icon/{{$result['name']}}.png" width="100px" alt=""><br>
                    {{$result['name']}}
                </div>
                @endforeach
            </div>

            <br>
            <br>

            <h1>Small Monsters</h1>
            <div class="row">
                @foreach($data2 as $result)
                <div class="col-sm-2 text-center">
                    <img src="/img/monster icon/{{$result['name']}}.png" width="100px" alt=""><br>
                    {{$result['name']}}
                </div>
                @endforeach
            </div>

        </div>
    </div>
    @endsection
</body>

</html>