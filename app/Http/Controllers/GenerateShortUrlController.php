<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class GenerateShortUrlController extends Controller
{
    public function index(){
        $user = Auth::user();
       

        if($user->role == 'Client'){
            $shortUrls = ShortUrl::where('client_id', $user->id)->orderByDesc('id')->get();
        }elseif($user->role == 'Admin'){
            $shortUrls = ShortUrl::where('client_id', $user->client_id)->orderByDesc('id')->get();
        }elseif($user->role == 'Member'){
            $shortUrls = ShortUrl::where('user_id', $user->id)->orderByDesc('id')->get();
        } else {    
            $shortUrls =    ShortUrl::orderByDesc('id')->limit(10)->get();
        }

        return view('shorturl.index', compact('shortUrls'));    
    }


    public function shortUrl($short_code){
        $shortUrl = ShortUrl::where('short_code', $short_code)->first();
        $shortUrl->increment('hits');
        if($shortUrl){
            return redirect($shortUrl->long_url);
        }
    }


    public function create(){
        if(Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Client'){
                    return redirect()->route('dashboard');

        }
        return view('shorturl.create');
    }

    public function store(Request $request){
        $request->validate([
            'long_url'=>'required|url',
        ]);

        ShortUrl::create([
            'user_id'       =>      Auth::user()->id,
            'client_id'     =>      Auth::user()->client_id,
            'long_url'      =>      $request->long_url,
            'short_code'    =>      uniqid(),
        ]);

        return redirect()->route('shorturls.index')->with('success','Short URL generated successfully.');
    }
}
