<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }
    public function showRegister(){
        return view('auth.register');
    }

    public function register(Request $request){
       // dd($request);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'type'=>$request->type,
            'password'=>Hash::make($request->password)

        ]);
        AccountType::create([
            'user_id'=>User::latest()->first()->id,
            'type'=>$request->type
        ]);

        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('show-chats');
    }

    public function login(Request $request){
        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return redirect()->route('show-chats');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login');

    }
}
