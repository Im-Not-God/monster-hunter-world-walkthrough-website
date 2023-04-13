<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArmorControllers extends Controller
{
    public function getAmmor($id){
        // Set the API endpoint URL
    $url = 'https://mhw-db.com/armor/sets/'.$id;

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
        return view('insideExample',['data'=>$data]);
        }
    }
}
