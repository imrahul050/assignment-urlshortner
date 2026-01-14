<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

     public function loggedIn(Request $request){
        $validated = $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|string',
        ]);
        if(Auth::attempt(request()->only('email','password'))){
            return redirect()->route('dashboard');
        }else{
            return back()->withErrors(['message'=>'Invalid Credentials']);
        }
       
    }
}
