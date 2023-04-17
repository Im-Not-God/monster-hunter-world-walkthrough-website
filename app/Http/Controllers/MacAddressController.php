<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MacAddressController extends Controller
{
    //
    public function checkMac()
    {
        return view('adminDetected');
        if ($admin = Admin::where('email', Auth::user()->email)->first())
            if ($admin->mac_address != strtok(exec('getmac'), ' ')) {
                return view('adminDetected');
            }
        return redirect('/');
    }

    public function changeMacConfirmation(Request $req)
    {
        switch ($req->action) {
            case '1':
                return redirect('/');
            case '2':
                $this->changeMac();
                return redirect('/directory');
            case '3':
                $this->changeMac();
                Auth::logout();
                return redirect("login");
        }
    }

    public function changeMac()
    {
        $admin = Admin::where('email', Auth::user()->email)->first();
        $admin->mac_address = strtok(exec('getmac'), ' ');
        $admin->save();
    }
}
