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
            <h1>Armor Set List</h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Rarity</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            <a href="/directory/armor_list/{{$item['id']}}" style="text-decoration: none;color: white;">
                                <?php echo $item['name']; ?>
                            </a>
                        </td>
                        <td>{{$item['pieces'][0]['rarity']}}</td>
                        <td>{{$item['pieces'][0]['rank']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endsection
</body>

</html>