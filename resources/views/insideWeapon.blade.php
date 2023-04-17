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
            <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/directory">Directory</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/directory/weapon_tree">Weapon</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="/directory/weapon_tree/{{$result['type']}}">{{$result['name']}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">detail</li>
                </ol>
            </nav> -->
            <?php
            $slots = '';
            $CraftingMaterials = '';
            $UpgradeMaterials = '';
            $durability = '';
            $attributes = '';
            $coatings = '';
            $elements = '';

            if ($result['slots']) {
                foreach ($result['slots'] as $slot) {
                    $slots .= '<img src="/img/slots/' . $slot['rank'] . '.png" alt="' . $slot['rank'] . '" width="25px">';
                }
            } else {
                $slots .= ' - ';
            }
            if ($result['crafting']['craftingMaterials']) {
                foreach ($result['crafting']['craftingMaterials'] as $craftingMaterials) {
                    $CraftingMaterials .= $craftingMaterials['item']['name'] . ' * ' . $craftingMaterials['quantity'] . ', ';
                }
                $CraftingMaterials = substr($CraftingMaterials, 0, -2);
            } else {
                $CraftingMaterials .= ' - ';
            }
            if ($result['crafting']['upgradeMaterials']) {
                foreach ($result['crafting']['upgradeMaterials'] as $upgradeMaterials) {
                    $UpgradeMaterials .= $upgradeMaterials['item']['name'] . ' * ' . $upgradeMaterials['quantity'] . ', ';
                }
                $UpgradeMaterials = substr($UpgradeMaterials, 0, -2);
            } else {
                $UpgradeMaterials .= ' - ';
            }

            if (array_key_exists('durability', $result)) {
                $durability .= '<div class="progress" style="max-width: 100%; min-width: 100px; border-radius: unset;border:1px solid black;">';
                $durability .=
                    '
                        <div class="progress-bar bg-danger" style="width: ' .
                    $result['durability'][0]['red'] / 4 .
                    '%;">
                            &nbsp; 
                        </div> 
                        <div class="progress-bar" style="background-color:orange; width: ' .
                    $result['durability'][0]['orange'] / 4 .
                    '%;">
                        &nbsp; 
                            &nbsp; 
                        </div> 
                        <div class="progress-bar bg-warning" style="width: ' .
                    $result['durability'][0]['yellow'] / 4 .
                    '%;">
                        &nbsp; 
                            &nbsp; 
                        </div> 
                        <div class="progress-bar bg-success" style=" width: ' .
                    $result['durability'][0]['green'] / 4 .
                    '%;">
                        &nbsp; 
                            &nbsp; 
                        </div> 
                        <div class="progress-bar" style="width: ' .
                    $result['durability'][0]['blue'] / 4 .
                    '%;">
                        &nbsp; 
                            &nbsp; 
                        </div> 
                        <div class="progress-bar bg-white" style="width: ' .
                    $result['durability'][0]['white'] / 4 .
                    '%;">
                        &nbsp; 
                            &nbsp; 
                        </div>';
                $durability .= '</div>';
            }
            if ($result['attributes']) {
                $loop = 0;
                foreach ($result['attributes'] as $name => $value) {
                    if ($name !== 'damageType' && $name !== 'elderseal' && $value) {
                        if ($loop > 0) {
                            $attributes .= ', ';
                        }
                        switch ($name) {
                            case 'affinity':
                                $attributes .= '<img src="/img/attributes/affinity.png" alt="affinity" width="25px">: ' . $value . '%';
                                break;
                            case 'defense':
                                $attributes .= '<img src="/img/attributes/defense.png" alt="defense" width="25px">: +' . $value . '';
                                break;
                            default:
                                $attributes .= $name . ': ' . $value . '</br>';
                        }
                    } elseif (!$loop) {
                        $attributes .= ' - ';
                    }
                    $attributes++;
                }
            } else {
                $attributes .= ' - ';
            }
            if (array_key_exists('coatings', $result)) {
                $lastIndex = count($result['coatings']) - 1;
                foreach ($result['coatings'] as $index => $coating) {
                    if ($coating != 'close range') {
                        $coatings .= '<img src="/img/coatings/' . $coating . '.png" alt="' . $coating . '" width="25px">' . $coating;
                        if ($index < $lastIndex) {
                            $coatings .= ',';
                        }
                    }
                }
            }
            if (array_key_exists('elements', $result) && $result['elements']) {
                if ($result['elements'][0]['hidden']) {
                    $elements .= '<img src="/img/elements/' . $result['elements'][0]['type'] . '.png" alt="' . $result['elements'][0]['type'] . '" width="25px">' . ': (' . $result['elements'][0]['damage'] . ')';
                } else {
                    $elements .= '<img src="/img/elements/' . $result['elements'][0]['type'] . '.png" alt="' . $result['elements'][0]['type'] . '" width="25px">' . ': ' . $result['elements'][0]['damage'];
                }
            } else {
                $elements .= ' - ';
            }
            ?>
            <div class='container'>
                <div class='row'>
                    <div class='col-md-4'>
                        @if ($result['assets'])
                        <img src="{{ $result['assets']['image'] }}" alt="{{ $result['name'] }} img">
                        @else
                        <img src="#" alt="Pictures are under repair">
                        @endif
                    </div>
                    <div class='col-md-8 d-flex align-items-center'>
                        <h2>{{ $result['name'] }}</h2>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <table class="table table-dark table-striped table-hover">
                            <tr>
                                <td>
                                    <p>Rarity</p>
                                    <strong>Rarity {{ $result['rarity'] }}</strong>
                                </td>
                                <td>
                                    <p>Attack</p>
                                    <strong>{{ $result['attack']['display'] }} | {{ $result['attack']['raw'] }}</strong>
                                </td>
                                <td>
                                    <p>Elements<br><?php echo $elements; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Slots</p>
                                    <?php echo $slots; ?>
                                </td>
                                <td colspan="2">
                                    <p>Attributes</p>
                                    <?php echo $attributes; ?>
                                </td>
                            </tr>
                            <tr>
                                @if ($durability)
                                <td colspan="3">
                                    <p>Durability</p>
                                    <?php echo $durability; ?>
                                </td>
                                @endif
                                @if ($coatings)
                                <td colspan="3">
                                    <p>Coatings</p>
                                    <?php echo $coatings; ?>
                                </td>
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class='col-md-6'>
                        <table class="table table-dark table-striped table-hover">
                            <tr>
                                <td>
                                    <p>Crafting Materials</p>
                                </td>
                                <td>
                                    <strong>{{ $CraftingMaterials }}</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Upgrade Materials</p>
                                </td>
                                <td>
                                    <strong>{{ $UpgradeMaterials }}</strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            @if (array_key_exists('ammo', $result))
            <h3>Ammo</h3>
            <table class="table table-dark table-striped table-hover">
                <tr>
                    <th>Ammo Name</th>
                    <th>LV1</th>
                    <th>LV2</th>
                    <th>LV3</th>
                </tr>
                @foreach ($result['ammo'] as $ammo)
                <tr>
                    <th><img src="/img/ammo/{{$ammo['type']}}.png" width="25px">{{ $ammo['type'] }}</th>
                    @foreach ($ammo['capacities'] as $ammoNum)
                    <th>{{ $ammoNum }}</th>
                    @endforeach
                    @for ($i = 0; $i < 3 - count($ammo['capacities']); $i++) <th> - </th>
                        @endfor
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>
    @endsection
</body>

</html>