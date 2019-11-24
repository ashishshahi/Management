<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Cache;
use Lang;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function login(Request $request){
        if (Auth::attempt(array('email'=>$request->input('email'),'password'=>$request->input('password')))) {
            return redirect()->intended('/home');
                
        } else {
            return redirect('login')
            ->with('error', Lang::get('general.login_permission_error'))
            ->withInput();
        }
        
    }
    public function logout()
    {
        Cache::flush();
        Auth::logout();
        return redirect('login')->with("message",Lang::get('general.signout_success'));
    }
    
}
