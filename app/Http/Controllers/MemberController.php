<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{

    public function index(){
        $user = Auth::user();
        $members = User::where('client_id',$user->id)->orderByDesc('id')->paginate(10);

        if($user->role == 'Client'){ 
            $members = User::where('client_id',$user->id)->orderByDesc('id')->get();
        } elseif($user->role == 'Admin'){
            $members = User::where('client_id',$user->client_id)->orderByDesc('id')->get();
        } else {
           $members = User::where('role','Client')->orderByDesc('id')->get();
        }


        return view('members.index', compact('members'));
    }


    public function create(){

        return view('members.create');
    }

    
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
            'role'=>'required|in:Admin,Member',
        ]);

        User::create([
            'role'=>$request->role,
            'client_id'=> Auth::user()->role == 'Client' ? Auth::user()->id : Auth::user()->client_id,
            'parent_id'=>Auth::user()->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            
        ]);

        return redirect()->route('members.index')->with('success','Member invited successfully.');
    }
}
