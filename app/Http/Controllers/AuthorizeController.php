<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthorizeController extends Controller
{
    //
    public function __construct()
    {
            
            $this->middleware('authorize');
            // $this->middleware('auth:superuser');
        }

    public function index()
    {
        return view('authorize', ['users' => User::all(), 'admins' => Admin::all()]);
    }

    public function action(Request $req)
    {
        if (Gate::allows('isSuperUser')) {
            $this->superUserSetRole($req);
        } else {
            $this->adminSetRole($req);
        }

        return redirect('/authorize');
    }


    public function adminSetRole(Request $req)
    {
        if($req->delete){
            User::find($req->id)->delete();
        }else{
            $user = User::find($req->id);
            $user->role = $req->role;
            $user->save();
        }
    }

    public function superUserSetRole(Request $req)
    {
        if ($req->admin) {
            if ($req->admin == "add") {
                $user = User::find($req->id);
                Admin::create([
                    'user_id' => $req->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'mac_address' => $user->mac_address,
                ]);
            } else {
                Admin::find($req->id)->delete();
            }
        } elseif($req->delete) {
            User::find($req->id)->delete();
        }else{
            $user = User::find($req->id);
            $user->role = $req->role;
            $user->save();
        }
    }
    // public function isSuperUser()
    // {
    //     $superUserMacAddress = ['00-50-56-C0-00-08'];
    //     $clientMacAddress = strtok(exec('getmac'), ' ');
    //     return in_array($clientMacAddress, $superUserMacAddress);
    // }
}
