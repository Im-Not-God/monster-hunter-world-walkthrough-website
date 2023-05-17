<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:superuser')->except('logout');
    }



    public function showLoginForm()
    {
        $superUserMacAddress = explode(', ', env('SUPERUSER_MAC_ADDRESS', ['00-50-56-C0-00-08']));
        $clientMacAddress = strtok(exec('getmac'), ' ');
        if (in_array($clientMacAddress, $superUserMacAddress)) {
            return view('auth.login', ['role' => 'superuser']);
        } elseif (Admin::where('mac_address', $clientMacAddress)->exists()) {
            return view('auth.login', ['role' => 'admin']);
        } else
            return view('auth.login');
    }

    protected function attemptLogin(Request $request)
    {

        if ($request->has('loginAs')) {
            return Auth::guard($request->loginAs)->attempt(
                $this->credentials($request),
                $request->boolean('remember')
            );
        }

        return $this->guard()->attempt(
            $this->credentials($request),
            $request->boolean('remember')
        );
    }

    protected function authenticated(Request $request, $user)
    {
        if ($request->has('redirect')) {
            return redirect($request->input('redirectUrl'));
        } else {
            return redirect()->intended($this->redirectPath());
        }
    }

    protected function haveAdminRole(Request $request)
    {
        if ($admin = Admin::with('user')->where('email', $request->email)) {
            $clientMacAddress = strtok(exec('getmac'), ' ');
            if ($admin->mac_address != $clientMacAddress) {
                return true;
            }
        }
        return false;
    }
}
