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
                <style>
                    table {
                        border-collapse: collapse;
                    }

                    table th,
                    table td {
                        border: 1px solid black;
                        padding: 8px;
                    }
                </style>
                <h1>Ailments</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Set the API endpoint URL
                        $url = 'https://mhw-db.com/ailments';
            
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
                            foreach ($data as $result) {
                        ?>
                        <tr>
                            <td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['description']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
</body>

</html>
