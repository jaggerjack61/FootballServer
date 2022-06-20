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

    public function showAdminRegister()
    {
        return view('auth.admin-register');
    }

    public function showAdminLogin()
    {
        return view('auth.admin-login');
    }


    public function register(Request $request){
       // dd($request);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,

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
        return redirect()->route('show-profiles');
    }

    public function login(Request $request){
        $user=User::where('email',$request->email)->first();
        if(AccountType::where('user_id',$user->id)->value('type')=='admin'){
            return back()->with('error','Please use admin panel when logging in with admin account.');
        }
        try {
            auth()->attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);
            return redirect()->route('show-profiles');
        }
        catch(\Exception $e){
            return back()->with('error','Make sure your Username and Password are correct.');
        }
    }

    public function adminLogin(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        if(AccountType::where('user_id',$user->id)->value('type')=='admin'){
            try {
                auth()->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);
                return redirect()->route('show-profiles');
            }
            catch(\Exception $e){
                return back()->with('error','Make sure your Username and Password are correct.');
            }
        }
        else{
            return back()->with('error','This page is for admin login only.');
        }

    }




    public function logout(){
        auth()->logout();
        return redirect()->route('login');

    }

    public function showDefault(){

    }

    public function showHome(){

    }
}
