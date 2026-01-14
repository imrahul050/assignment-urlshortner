<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index(){
        $clients = User::where('role','Client')->orderByDesc('id')->paginate(10);
        return view('clients.index', compact('clients'));
    }


    public function create(){

        return view('clients.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6',
        ]);

        User::create([
            'role'=>'Client',
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            
        ]);

        return redirect()->route('clients.index')->with('success','Client invited successfully.');
    }

    public function members(){
        $members = User::where('role','!=','Admin')->orderByDesc('id')->paginate(10);
        return view('clients.members', compact('members'));
    }   

    
}