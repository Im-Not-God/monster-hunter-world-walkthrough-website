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
        .meleeDiv {
            width: 100%;
            height: 500px;
            opacity: 1;
            position: absolute;
            top: 270px;
            left: 350px;
            display: flex;
            flex-wrap: wrap;
            align-items: left;
            justify-content: left;
        }

        .rangeDiv {
            width: 100%;
            height: 500px;
            opacity: 1;
            position: absolute;
            top: 1010px;
            left: 350px;
            display: flex;
            flex-wrap: wrap;
            align-items: left;
            justify-content: left;
        }

        .meleeContainer {
            width: 19%;
            height: 200px;
            margin: 0 1%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .rangeContainer {
            width: 19%;
            height: 200px;
            margin: 0 1%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .melee {
            height: 100px;
            margin-top: 10px;
            font-family: Marcellus SC;
            font-weight: Regular;
            font-size: 24px;
            opacity: 1;
            text-align: center;
            color: rgba(255, 255, 255, 1);
            text-decoration: none;
        }

        .meleeWord {
            width: 129px;
            color: rgba(255, 255, 255, 1);
            position: absolute;
            top: 220px;
            left: 420px;
            font-family: Marcellus SC;
            font-weight: Regular;
            font-size: 48px;
            opacity: 1;
            text-align: left;
        }

        .rangeWord {
            width: 134px;
            color: rgba(255, 255, 255, 1);
            position: absolute;
            top: 920px;
            left: 420px;
            font-family: Marcellus SC;
            font-weight: Regular;
            font-size: 48px;
            opacity: 1;
            text-align: left;
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
                <span class="meleeWord">Melee</span>
                <div class="meleeDiv">
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/great_sword">
                            <img src="{{ asset('img\weapon icon\great_sword.png') }}" alt="GreatSword"><br>
                            <span class="melee">Great Sword</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/long_sword">
                            <img src="{{ asset('img\weapon icon\long_sword.png') }}" alt="Long Sword"><br>
                            <span class="melee">Long Sword</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/dual_blades">
                            <img src="{{ asset('img\weapon icon\dual_blades.png') }}" alt="Dual Blades"><br>
                            <span class="melee">Dual Blades</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/sword_shield">
                            <img src="{{ asset('img\weapon icon\sword_shield.png') }}" alt="Sword & Shield"><br>
                            <span class="melee">Sword &amp; Shield</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/hammer">
                            <img src="{{ asset('img\weapon icon\hammer.png') }}" alt="Hammer"><br>
                            <span class="melee">Hammer</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/hunting_horn">
                            <img src="{{ asset('img\weapon icon\hunting_horn.png') }}" alt="Hunting Horn"><br>
                            <span class="melee">Hunting Horn</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/lance">
                            <img src="{{ asset('img\weapon icon\lance.png') }}" alt="Lance"><br>
                            <span class="melee">Lance</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/gunlance">
                            <img src="{{ asset('img\weapon icon\gunlance.png') }}" alt="Gunlance"><br>
                            <span class="melee">Gunlance</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/switch_axe">
                            <img src="{{ asset('img\weapon icon\switch_axe.png') }}" alt="Switch Axe"><br>
                            <span class="melee">Switch Axe</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/charge_blade">
                            <img src="{{ asset('img\weapon icon\charge_blade.png') }}" alt="Charge Blade"><br>
                            <span class="melee">Charge Blade</span>
                        </a>
                    </div>
                    <div class="meleeContainer">
                        <a href="/directory/weapon_tree/insect_glaive">
                            <img src="{{ asset('img\weapon icon\insect_glaive.png') }}" alt="Insect Glaive"><br>
                            <span class="melee">Insect Glaive</span>
                        </a>
                    </div>

                </div>
                <span class="rangeWord">Range</span>
                <div class="rangeDiv">
                    <div class="rangeContainer">
                        <a href="/directory/weapon_tree/bow">
                            <img src="{{ asset('img\weapon icon\bow.png') }}" alt="Bow"><br>
                            <span class="melee">Bow</span>
                        </a>
                    </div>
                    <div class="rangeContainer">
                        <a href="/directory/weapon_tree/light_bowgun">
                            <img src="{{ asset('img\weapon icon\light_bowgun.png') }}" alt="Light Bowgun"><br>
                            <span class="melee">Light Bowgun</span>
                        </a>
                    </div>
                    <div class="rangeContainer">
                        <a href="/directory/weapon_tree/heavy_bowgun">
                            <img src="{{ asset('img\weapon icon\heavy_bowgun.png') }}" alt="GreatSword"><br>
                            <span class="melee">Heavy Bowgun</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</body>

</html>
