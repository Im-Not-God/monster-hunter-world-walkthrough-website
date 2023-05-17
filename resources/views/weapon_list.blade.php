<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weapon List</title>
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>

        .weapon {
            margin-bottom: 25px;
        }

        .weapon a{
            font-family: Marcellus SC;
            font-weight: Regular;
            font-size: 24px;
            text-align: center;
            color: rgba(255, 255, 255, 1);
            text-decoration: none;
        }


    </style>
</head>

<body>

    @extends('layouts.navigation')
    @section('content')
    <div class="d-flex">
        <div>
            @include('sideNav')
        </div>
        <div class="container">
            <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/directory">Directory</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Weapon</li>
                </ol>
            </nav> -->

            <h1>Melee</h1>
            <div class="row weapon">
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/great-sword">
                        <img src="{{ asset('img\weapon icon\great_sword.png') }}" alt="GreatSword"><br>
                        Great Sword
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/long-sword">
                        <img src="{{ asset('img\weapon icon\long_sword.png') }}" alt="Long Sword"><br>
                        Long Sword
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/dual-blades">
                        <img src="{{ asset('img\weapon icon\dual_blades.png') }}" alt="Dual Blades"><br>
                        Dual Blades
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/sword-shield">
                        <img src="{{ asset('img\weapon icon\sword_shield.png') }}" alt="Sword & Shield"><br>
                        Sword &amp; Shield
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/hammer">
                        <img src="{{ asset('img\weapon icon\hammer.png') }}" alt="Hammer"><br>
                        Hammer
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/hunting-horn">
                        <img src="{{ asset('img\weapon icon\hunting_horn.png') }}" alt="Hunting Horn"><br>
                        Hunting Horn
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/lance">
                        <img src="{{ asset('img\weapon icon\lance.png') }}" alt="Lance"><br>
                        Lance
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/gunlance">
                        <img src="{{ asset('img\weapon icon\gunlance.png') }}" alt="Gunlance"><br>
                        Gunlance
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/switch-axe">
                        <img src="{{ asset('img\weapon icon\switch_axe.png') }}" alt="Switch Axe"><br>
                        Switch Axe
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/charge-blade">
                        <img src="{{ asset('img\weapon icon\charge_blade.png') }}" alt="Charge Blade"><br>
                        Charge Blade
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/insect-glaive">
                        <img src="{{ asset('img\weapon icon\insect_glaive.png') }}" alt="Insect Glaive"><br>
                        Insect Glaive
                    </a>
                </div>
            </div>

            </br>
            </br>

            <h1>Range</h1>

            <div class="row weapon">
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/bow">
                        <img src="{{ asset('img\weapon icon\bow.png') }}" alt="Bow"><br>
                        Bow
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/light-bowgun">
                        <img src="{{ asset('img\weapon icon\light_bowgun.png') }}" alt="Light Bowgun"><br>
                        Light Bowgun
                    </a>
                </div>
                <div class="col-sm-3 text-center weapon">
                    <a href="/directory/weapon_tree/heavy-bowgun">
                        <img src="{{ asset('img\weapon icon\heavy_bowgun.png') }}" alt="GreatSword"><br>
                        Heavy Bowgun
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>

</html>