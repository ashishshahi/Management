<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cache;
use Lang;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } 
    public function login(Request $request){
        if (Auth::attempt(array('email'=>$request->input('email'),'password'=>$request->input('password')))) {
           if (Auth::user()->roles()->get()->first()->name == "super-admin") {
            return redirect()->intended('/home');
           } else {
            Cache::flush();
            Auth::logout();
            return redirect('login')
            ->with('error', Lang::get('general.login_permission_error'))
            ->withInput();
           }
                
        } else {
            return redirect('login')
            ->with('error',Lang::get('general.login_error'))
            ->withInput();
        }
        
    }
    public function logout()
    {
        Cache::flush();
        Auth::logout();
        return redirect('login')->with("message",Lang::get('general.signout_success'));
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/home');
        }
    }
}
