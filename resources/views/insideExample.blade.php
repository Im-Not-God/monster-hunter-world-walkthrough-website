<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Armor</title>
</head>
<body>

    <h2>Material</h2>
    <table>
        <tr>
            <th>Gear Name</th>
            <th>Production materials</th>
        </tr>
        @foreach($data['pieces'] as $result)
        <tr>
            <td>{{$result['name']}}</td>
            <?php
            $materials = '';
                foreach($result['crafting']['materials'] as $material){
                    $materials .= $material['item']['name'].' * '.$material['quantity'].", ";
                }
                $materials = substr($materials, 0, -2);
            ?>
            <td>{{$materials}}</td>
        </tr>
        @endforeach
    </table>

    <h2>Attribute</h2>
    <table>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Defence</th>
            <th>Fire</th>
            <th>Water</th>
            <th>Thunder</th>
            <th>Ice</th>
            <th>Dragon</th>
            <th>Slots</th>
            <th>Active Skills</th>
        </tr>
        @foreach($data['pieces'] as $result)
        <tr>
            <td>{{$result['type']}}</td>
            <td>{{$result['name']}}</td>
            <td>{{$result['defense']['base']}} -> {{$result['defense']['max']}}</td>
            <td>{{$result['resistances']['fire']}}</td>
            <td>{{$result['resistances']['water']}}</td>
            <td>{{$result['resistances']['ice']}}</td>
            <td>{{$result['resistances']['thunder']}}</td>
            <td>{{$result['resistances']['dragon']}}</td>
            <?php
            $slots = '';
            $skills = '';
            if ($result['slots']) {
                foreach ($result['slots'] as $slot) {
                $slots .= '<img src="/img/slots/' . $slot['rank'] . '.png" alt="' . $slot['rank'] . '" width="25px">';
            }
            }else{
                $slots .= ' - ';
            }
            if ($result['skills']) {
                foreach ($result['skills'] as $skill) {
                    $skills .= $skill['skillName'].' '.$skill['level']."\n";
                }
                $skills = substr($skills, 0, -1);
            }else{
                $skills .= ' - ';
            }
            ?>
            <td>{{$slots}}</td>
            <td>{{$skills}}</td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>