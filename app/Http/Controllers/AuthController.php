<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function loginIndex(){
        return view("login");
    }

    public function login(Request $request){
        $validated = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required", "string"]
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->intended(route('post.create'));
        }else{
            return redirect()->back()->with("erro", "E-mail ou senha inválidos");
        }
    }

    public function registerIndex(){
        return view("register");
    }

    public function register(Request $request){
        
        $validated = $request->validate([
            "name" => ["required", "string"],
            "email"=> ["required", "email"],
            "password"=> ["required", "string", "confirmed"]
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);

        $user->save();

        Auth::attempt($validated);
        return redirect()->intended(route('post.create'));
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
