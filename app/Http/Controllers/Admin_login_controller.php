<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin_login_controller extends Controller
{
    public function ShowLoginPage(){
        return view('Admin.Login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('Admin.dashboard_screen');
        }
        return back()->withErrors([
            'email'=>'The provided credentials do not match our records.'
        ]);
     }
}