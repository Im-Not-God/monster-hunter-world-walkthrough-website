<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorizeController extends Controller
{
    //
    public function getAllUsers(){
        return view('authorize', ['users' => User::all()]);
    }
}
