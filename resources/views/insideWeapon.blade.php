<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weapon Details</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <?php
    $slots = '';
    $CraftingMaterials = '';
    $UpgradeMaterials = '';
    $durability = '';
    $attributes = '';
    if ($result['slots']) {
        foreach ($result['slots'] as $slot) {
            $slots .= '<img src="/img/slots/' . $slot['rank'] . '.png" alt="' . $slot['rank'] . '" width="25px">';
        }
    }else{
        $slots .= ' - ';
    }
    if ($result['crafting']['craftingMaterials']) {
        foreach ($result['crafting']['craftingMaterials'] as $craftingMaterials) {
            $CraftingMaterials .= $craftingMaterials['item']['name'].' * '.$craftingMaterials['quantity'].", ";
        }
        $CraftingMaterials = substr($CraftingMaterials, 0, -2);
    }else{
        $CraftingMaterials .= ' - ';
    }
    if ($result['crafting']['upgradeMaterials']) {
        foreach ($result['crafting']['upgradeMaterials'] as $upgradeMaterials) {
            $UpgradeMaterials .= $upgradeMaterials['item']['name'].' * '.$upgradeMaterials['quantity'].", ";
        }
        $UpgradeMaterials = substr($UpgradeMaterials, 0, -2);
    }else{
        $UpgradeMaterials .= ' - ';
    }

    if (array_key_exists('durability', $result)) {
        $durability .= '<div class="progress" style="max-width: 100%; min-width: 100px; border-radius: unset;border:1px solid black;">';
        $durability .= '
        <div class="progress-bar bg-danger" style="width: ' . ($result['durability'][0]['red'] / 4) . '%;">
            &nbsp; 
        </div> 
        <div class="progress-bar" style="background-color:orange; width: ' . ($result['durability'][0]['orange'] / 4) . '%;">
        &nbsp; 
            &nbsp; 
        </div> 
        <div class="progress-bar bg-warning" style="width: ' . ($result['durability'][0]['yellow'] / 4) . '%;">
        &nbsp; 
            &nbsp; 
        </div> 
        <div class="progress-bar bg-success" style=" width: ' . ($result['durability'][0]['green'] / 4) . '%;">
        &nbsp; 
            &nbsp; 
        </div> 
        <div class="progress-bar" style="width: ' . ($result['durability'][0]['blue'] / 4) . '%;">
        &nbsp; 
            &nbsp; 
        </div> 
        <div class="progress-bar bg-white" style="width: ' . ($result['durability'][0]['white'] / 4) . '%;">
        &nbsp; 
            &nbsp; 
        </div>';
        $durability .= '</div>';
    }
    if ($result['attributes']) {//要改
        foreach ($result['attributes'] as $name => $value) {
            if ($name != "damageType" && $value)
                $attributes .= $name . ": " . $value . '</br>';
        }
    } else {
        $attributes .= ' - ';
    }
    ?>

    <h2>{{$result['name']}}</h2>
    <table>
        <tr>
            <td><img src="{{$result['assets']['image']}}" alt="{{$result['name']}} img"></td>
        </tr>
        <tr>
            <td>
                <p>Attack</p>
                {{$result['attack']['display']}} | {{$result['attack']['raw']}}
            </td>
        </tr>
        <tr>
            <td>
                <p>Rarity</p>
                {{$result['rarity']}}
            </td>
        </tr>
        <tr>
            <td>
                <p>Slots</p>
                {{$slots}}
            </td>
        </tr>
        <tr>
            <td>
                <p>Crafting  Materials</p>
                {{$CraftingMaterials}}
            </td>
        </tr>
        <tr>
            <td>
                <p>Upgrade Materials</p>
                {{$UpgradeMaterials}}
            </td>
        </tr>
        <tr>
            <td>
                <p>Durability</p>
                <?php echo $durability?>
            </td>
        </tr>
        <tr>
            <td>
                <p>Attributes</p>
                <?php echo $attributes?>
            </td>
        </tr>
    </table>
</body>
</html>