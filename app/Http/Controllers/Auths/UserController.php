<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'user';
    protected $maxAttempts = 3;
    // protected $decayMinutes = 2;

    protected $loginRoute;

    public function __construct()
    {
        $this->middleware('guest:user')->except('logout');
        $this->loginRoute = route('user.login');
    }
    public function login_form (){

        return View('auth.login');

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

        if (Auth::guard('user')->attempt($credential_email)) {

            $request->session()->regenerate();
            // echo dd(Auth::guard());
            return redirect()->route('home');

        }else{

            $this->incrementLoginAttempts($request);
            return redirect()->route('user.logins')->with('error', 'Email and Password are wrong');
        }

    }

    public function logout(Request $request){
        Auth::guard($this->guardName)->logout();
        $request->session()->flush();
        return redirect()->guest($this->loginRoute);
    }
}
