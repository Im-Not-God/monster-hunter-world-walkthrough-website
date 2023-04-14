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
                <?php
                // Set the maximum execution time to 360 seconds (2 minutes)
                set_time_limit(360);
            
                // Set the API endpoint URL
                $url = 'https://mhw-db.com/armor';
            
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
                ?>
                <h1>Armor List</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Armor Name</th>
                            <th>Rarity</th>
                            <th>Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $item): ?>
                        <tr>
                            <td>
                                <a href="/directory/ammor_list/<?php echo $item['id']; ?>">
                                    <?php echo $item['name']; ?>
                                </a>
                            </td>
                            <td><?php echo $item['rarity']; ?></td>
                            <td><?php echo $item['rank']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
                }
                ?>
            </div>
        @endsection
</body>

</html>
