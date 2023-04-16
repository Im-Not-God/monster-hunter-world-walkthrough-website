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

    @extends('layouts.navigation')
    @section('content')
    <div class="d-flex">
        <div>
            @include('sideNav')
        </div>
        <div class="container">
            <h2>Large Monsters</h2>
            <?php
            // Set the API endpoint URL
            $url = 'https://mhw-db.com/monsters?q={"type":"large"}';

            // Fetch the JSON data from the API endpoint
            $json_data = file_get_contents($url);

            // Decode the JSON data into a PHP array
            $data = json_decode($json_data, true);

            // Check if the JSON data was successfully decoded
            if ($data === null) {
                // Handle the decoding error
                echo "Error decoding JSON data";
            } else {
                // Process the data
                // ..
            ?>
                <div class="row">
                    @foreach($data as $result)
                    <div class="col-sm-2 text-center">
                        <a href="#?id={{$result['id']}}" class="text-decoration-none">
                            <img src="/img/monster icon/{{$result['name']}}.png" width="100px" alt=""><br>
                            {{$result['name']}}
                        </a>
                    </div>
                    @endforeach
                </div>
            <?php

            }

            ?>
            </br>
            <h2>Small Monsters</h2>
            <?php
            // Set the API endpoint URL
            $url = 'https://mhw-db.com/monsters?q={"type":"small"}';

            // Fetch the JSON data from the API endpoint
            $json_data = file_get_contents($url);

            // Decode the JSON data into a PHP array
            $data = json_decode($json_data, true);

            // Check if the JSON data was successfully decoded
            if ($data === null) {
                // Handle the decoding error
                echo "Error decoding JSON data";
            } else {
                // Process the data
                // ..
            ?>
                <div class="row">
                    @foreach($data as $result)
                    <div class="col-sm-2 text-center">
                        <a href="#?id={{$result['id']}}" class="text-decoration-none">
                            <img src="/img/monster icon/{{$result['name']}}.png" width="100px" alt=""><br>
                            {{$result['name']}}
                        </a>
                    </div>
                    @endforeach
                </div>
            <?php

            }

            ?>
        </div>
    </div>
    @endsection
</body>

</html>