<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserDashboardController extends Controller
{
    public function index(){
        // dd(Auth::user());
        $user = Auth::user();
        if($user->role == 'Client'){ 
            $shortUrls = ShortUrl::where('client_id', $user->id)->orderByDesc('id')->limit(10)->get();
            $members = User::where('client_id',$user->id)->orderByDesc('id')->limit(10)->get();
        } elseif($user->role == 'Admin'){
            $members = User::where('client_id',$user->client_id)->orderByDesc('id')->limit(10)->get();
        } else {
           $members = User::where('role','Client')->orderByDesc('id')->limit(10)->get();
        }

        if($user->role == 'Admin'){
            $shortUrls = ShortUrl::where('client_id', $user->client_id)->orderByDesc('id')->limit(10)->get();
        }elseif($user->role == 'Member'){
            $shortUrls = ShortUrl::where('user_id', $user->id)->orderByDesc('id')->limit(10)->get();
        } else {    
            $shortUrls =    ShortUrl::orderByDesc('id')->limit(10)->get();
        }

        return view('dashboard',compact('user','members','shortUrls'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }   
}
