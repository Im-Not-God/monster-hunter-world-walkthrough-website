<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class WeaponController extends Controller
{

    public function getWeapon($type)
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/weapons?q={"type":"' . $type . '"}';

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
            return view('example', ['weaponTree' => $this->generateWeaponTree($data, $type), 'type' => $type]);
        }
    }

    public function generateWeaponTree($data, $type, $parentId = null, $level = 0, $token = false)
    {
        $output = '';

        foreach ($data as $weapon) {
            if ($weapon['crafting']['previous'] == $parentId) {
                if ($token)
                    $level--;

                $tab = "";
                for ($i = 0; $i < abs($level); $i++) {
                    $tab .= "&emsp;";
                }
                $output .= '<tr data-id="' . $weapon['id'] . '">';
                $output .= '<td class="weaponRow" data-pid="' . $parentId . '">' . $tab . $weapon['name'] . '</td>';
                $output .= '<td class="text-center">' . $weapon['rarity'] . '</td>';
                $output .= '<td class="text-center">' . $weapon['attack']['display'] . '</td>';

                if ($type != "light-bowgun" && $type != "heavy-bowgun") {
                    if (array_key_exists('elements', $weapon) && $weapon['elements']) {
                        if ($weapon['elements'][0]["hidden"]) {
                            $output .= '<td class="text-center text-secondary"><img src="/img/elements/' . $weapon['elements'][0]['type'] . '.png" alt="' . $weapon['elements'][0]['type'] . '" width="25px">' . ': (' . $weapon['elements'][0]['damage'] . ')</td>';
                        } else {
                            $output .= '<td class="text-center"><img src="/img/elements/' . $weapon['elements'][0]['type'] . '.png" alt="' . $weapon['elements'][0]['type'] . '" width="25px">' . ': ' . $weapon['elements'][0]['damage'] . '</td>';
                        }
                    } else {
                        $output .= '<td class="text-center"> - </td>';
                    }
                }

                if (array_key_exists('durability', $weapon)) {
                    $output .= '<td class="align-center"><div class="progress" style="max-width: 100%; min-width: 100px; border-radius: unset;border:1px solid black;">';
                    $output .= '
                    <div class="progress-bar bg-danger" style="width: ' . ($weapon['durability'][0]['red'] / 4) . '%;">
                        &nbsp; 
                    </div> 
                    <div class="progress-bar" style="background-color:orange; width: ' . ($weapon['durability'][0]['orange'] / 4) . '%;">
                    &nbsp; 
                        &nbsp; 
                    </div> 
                    <div class="progress-bar bg-warning" style="width: ' . ($weapon['durability'][0]['yellow'] / 4) . '%;">
                    &nbsp; 
                        &nbsp; 
                    </div> 
                    <div class="progress-bar bg-success" style=" width: ' . ($weapon['durability'][0]['green'] / 4) . '%;">
                    &nbsp; 
                        &nbsp; 
                    </div> 
                    <div class="progress-bar" style="width: ' . ($weapon['durability'][0]['blue'] / 4) . '%;">
                    &nbsp; 
                        &nbsp; 
                    </div> 
                    <div class="progress-bar bg-white" style="width: ' . ($weapon['durability'][0]['white'] / 4) . '%;">
                    &nbsp; 
                        &nbsp; 
                    </div>';
                    $output .= '</div></td>';
                }

                if ($type == "heavy-bowgun") {
                    if (array_key_exists('specialAmmo', $weapon)) {
                        if ($weapon['specialAmmo'])
                            $output .= '<td class="text-center">' . $weapon['specialAmmo'] . '</td>';
                        else
                            $output .= '<td class="text-center"> - </td>';
                    }
                }

                if (array_key_exists('coatings', $weapon)) {
                    $output .= '<td class="text-center">';
                    $lastIndex = count($weapon['coatings']) - 1;
                    foreach ($weapon['coatings'] as $index => $coating) {
                        if ($coating != "close range") {
                            $output .= '<img src="/img/coatings/' . $coating . '.png" alt="' . $coating . '" width="25px">' . $coating;
                            if ($index < $lastIndex)
                                $output .= ',';
                        }
                    }
                    $output .= '</td>';
                }

                if (array_key_exists('phial', $weapon)) {
                    if ($weapon['phial'])
                        $output .= '<td class="text-center">' . $weapon['phial']['type'] . ($weapon['phial']['damage'] ? (': ' . $weapon['phial']['damage']) : '') . '</td>';
                    else
                        $output .= '<td class="text-center"> - </td>';
                }

                if ($weapon['slots']) {
                    $output .= '<td class="text-center">';
                    foreach ($weapon['slots'] as $slot) {
                        $output .= '<img src="/img/slots/' . $slot['rank'] . '.png" alt="' . $slot['rank'] . '" width="25px">';
                    }
                    $output .= '</td>';
                } else {
                    $output .= '<td class="text-center"> - </td>';
                }

                if ($weapon['attributes']) {
                    $output .= '<td class="text-center">';
                    $loop =0;
                    foreach ($weapon['attributes'] as $name => $value) {
                        if ($name!=='damageType' && $name!=='elderseal' && $value) {
                            if($loop>0){
                                $output .= ', ';
                            }
                            switch ($name) {
                                case 'affinity':
                                    $output .= '<img src="/img/attributes/affinity.png" alt="affinity" width="25px">: ' . $value . '%';
                                    break;
                                case 'defense':
                                    $output .= '<img src="/img/attributes/defense.png" alt="defense" width="25px">: +' . $value . '';
                                    break;
                                default:
                                    $output .= $name . ': ' . $value . '</br>';
                            }
                        }elseif(!$loop){
                            $output .= ' - ';
                        }
                        $loop++;
                    }
                    $output .= '</td>';
                } else {
                    $output .= '<td class="text-center"> - </td>';
                }

                $output .= '</tr>';
                if (count($weapon['crafting']['branches']) != 0) {
                    $token = true;
                    $output .= $this->generateWeaponTree($data, $type, $weapon['id'], $level++, $token);
                } else {
                    $token = false;
                }
            }
        }

        return $output .= "";
    }
}
