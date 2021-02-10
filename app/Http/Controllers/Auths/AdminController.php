<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'admin';
    protected $maxAttempts = 3;
    // protected $decayMinutes = 2;

    protected $loginRoute;

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->loginRoute = route('admin.login');
    }
    public function login_form (){

        return View('auth.Adminlogin');

    }

    public function login (Request $request){

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            $this->sendLockoutResponse($request);
        }

        $credential_email = [
            'email' => $request->username,
            'password' => $request->password
        ];

        $credential_username = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if (Auth::guard('admin')->attempt($credential_email) || Auth::guard('admin')->attempt($credential_username)) {

            $request->session()->regenerate();

            return redirect()->route('home');

        }else{

            $this->incrementLoginAttempts($request);
            return redirect()->route('admin.logins')->with('error', 'Email and Password are wrong');
        }

    }

    public function logout(Request $request){
        Auth::guard($this->guardName)->logout();
        $request->session()->flush();
        return redirect()->route('home');

    }
}
