<?php

namespace App\Http\Controllers;

use Session; 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthManager extends Controller
{
    function login (){

            return view('login');
        }

    function loginpost(Request $request){
        $request ->validate([
                    'email'=>'required|email',
                    'password'=>'required'
                ]);
        $credentials=  $request ->only('email','password');
        if( Auth::attempt($credentials)){
             return redirect()->intended(route('home'))->with("sucess","login complete");
        }
        return redirect(route('login'))->with("error","details nt tr");
    }

    function registration(){
        return view('registration');
     }

    function registrationpost(Request $request){
        $request ->validate([
                            'name'=>'required',
                            'email'=>'required|email|unique:users',
                            'password'=>'required'
        ]);

        $data['name'] =$request ->name;
        $data['email'] =$request ->email;
        $data['password'] =Hash::make( $request ->password);

        $user=User::create($data);
        if(!$user){
            return  redirect(route('registration'))->with("error","registration error");
        }
        return  redirect(route('login'))->with("success","registration suceaa");

     }
     function logout(){
        Session::flush();
        Auth::logout();
         return redirect(route('login'));
     }
}
