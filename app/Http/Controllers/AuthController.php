<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }
 
     public function authLogin(Request $request){

        $user = [
           "username" => $request->username,
           "email" => $request->email,
           "password" => $request->password
         ];

         if(!Auth::attempt($user)) return redirect()->back()->with('message','Username Atau Password Salah!');

         if(Auth::user()->roles == 'user' ) return redirect()->route('user.index');
         elseif (Auth::user()->roles == 'admin') return redirect()-> route('admin.index');
    }


     public function authRegister(Request $request){

        // $user = new User();
        // $user->username = $request->username;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();

        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:7',
        ]);

        $user = new User([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $user->save();

        // dd($user);
        return redirect()->route('auth.login');
    }

    public function logout(){
        Auth::logout();
  
        request()->session()->invalidate();
  
        return redirect()->route('auth.login');
    }
}
