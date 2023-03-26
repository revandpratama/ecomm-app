<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'username' => 'required|unique:users|min:4',
            'email' => 'required|unique:users|email:dns',
            'password' => 'required|min:4|max:255'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        // ? using Hash class
        // $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Register Success, Login now');
    }
}
