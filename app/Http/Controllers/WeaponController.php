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
            return view('example', ['weaponTree'=>$this->generateWeaponTree($data), 'total'=>count($data), 'weapons'=>$data]);
        }
    }

    public function generateWeaponTree($data, $parentId = null, $level=0, $token = false)
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

        // $output = '<div class="dul tree">';

        // foreach($data as $weapon){
        //     if($weapon['crafting']['previous']==$parentId){
        //         $output .= '<div class="dli tree">'.$weapon['name'];
        //         if(count($weapon['crafting']['branches']) != 0){
        //             $output .= $this->generateWeaponTree($data, $weapon['id']);
        //         }else{
        //             $output .= '</div>';
        //         }
        //     }
        // }
        // return $output .= '</div>';

        $output = '';

        foreach($data as $weapon){
            if($weapon['crafting']['previous']==$parentId){
                // if(strlen($tab)){
                //     $output .= '<tr><td>'.$tab."┗".$weapon['name'].'</td></tr>';
                // }
                // if($parentId==null){
                //     $tab="";
                //     // $level=1;
                // }
                if($token)
                    $level--;
                
                $tab="";
                for($i=0; $i< abs($level); $i++){
                    $tab.="&emsp;";
                }
                $output .= '<tr><td class="weaponRow">'.$tab.$weapon['id']." ".$weapon['name']." pid:$parentId".'</td></tr>';

                if(count($weapon['crafting']['branches']) != 0){
                    $token = true;
                    $output .= $this->generateWeaponTree($data, $weapon['id'], $level++, $token);
                }else{
                    $token = false;
                }
            }
        }
        
        return $output.="";
    }
}
