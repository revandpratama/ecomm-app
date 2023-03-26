<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validatedData = $request->validate($rules);

        if(Auth::attempt($validatedData)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Email or Password is wrong!');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
