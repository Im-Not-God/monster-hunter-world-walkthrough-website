<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class directoryController extends Controller
{
    //Armor
    public function getArmorList()
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/armor/sets';

        $data = session('armorList');

        if (!$data) {
            $data = $this->getData($url);
            session(['armorList' => $data]);
        }

        return view('armor_list', ['data' => $data]);
    }

    public function getArmorDetail($id)
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/armor/sets/' . $id;
        $data = $this->getData($url);
        return view('armor_detail', ['data' => $data]);
    }

    //Weapon
    public function getWeapon($type)
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/weapons?q={"type":"' . $type . '"}';
        $data = $this->getData($url);

        return view('weapon_tree', ['weaponTree' => app('App\Http\Controllers\WeaponController')->generateWeaponTree($data, $type), 'type' => $type]);
    }

    public function getWeaponDetail($id)
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/weapons/' . $id;
        $data = $this->getData($url);
        return view('insideWeapon', ['result' => $data]);
    }

    //Monster
    public function getMonsterList()
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/monsters?q={"type":"large"}';
        $data1 = $this->getData($url);
        $url = 'https://mhw-db.com/monsters?q={"type":"small"}';
        $data2 = $this->getData($url);
        return view('monster_list', ['data1' => $data1, 'data2' => $data2]);
    }

    //Decoration
    public function getDecorationList()
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/decorations';
        $data = $this->getData($url);
        return view('decorations_list', ['data' => $data]);
    }

    //Skill
    public function getSkillList()
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/skills';
        $data = $this->getData($url);
        return view('skill_list', ['data' => $data]);
    }


    //Ailment
    public function getAilmentList()
    {
        // Set the API endpoint URL
        $url = 'https://mhw-db.com/ailments';
        $data = $this->getData($url);
        return view('ailment_list', ['data' => $data]);
    }

    public function getData($url)
    {
        // Fetch the JSON data from the API endpoint
        set_time_limit(300);

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
            return $data;
        }
    }
}
