<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show()
    {
        return view('account.index', [
            'user' => auth()->user()
        ]);
    }

    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:4|max:255',
            'username' => 'required|unique:users|min:4',
            'email' => 'required|email:dns'
        ]);


        User::where('username', auth()->user()->username)->update($validatedData);

        return redirect('/account/' . auth()->user()->username)->with('success', 'Account updated');
    }
}
