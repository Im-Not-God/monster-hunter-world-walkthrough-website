<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class WeaponController extends Controller
{
    //
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
            
            return view('example', ['weaponTree'=>$this->generateWeaponTree($data)]);
        }
    }

    public function generateWeaponTree($data, $parentId = null, $tab="")
    { 
        // $output = '<ul>';

        // foreach($data as $weapon){
        //     if($weapon['crafting']['previous']==$parentId){
        //         $output .= '<li>'.$weapon['name'];
        //         if(count($weapon['crafting']['branches']) != 0){
        //             $output .= $this->generateWeaponTree($data, $weapon['id']);
        //         }else{
        //             $output .= '</li>';
        //         }
        //     }
        // }
        // return $output .= '</ul>';

        $output = '';

        foreach($data as $weapon){
            if($weapon['crafting']['previous']==$parentId){
                // if(strlen($tab)){
                //     $output .= '<tr><td>'.$tab."┗".$weapon['name'].'</td></tr>';
                // }
                if($parentId==null){
                    $tab="";
                }
                $output .= '<tr class="weaponRow"><td>'.$tab.$weapon['name'].'</td></tr>';

                if(count($weapon['crafting']['branches']) != 0){
                    $output .= $this->generateWeaponTree($data, $weapon['id'], $tab.="&emsp;");
                }
            }
        }
        return $output;
    }
}
