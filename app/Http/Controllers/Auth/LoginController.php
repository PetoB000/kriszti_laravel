<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/admin'); 
        }

        return back()->withErrors([
            'username' => 'Hibás felhasználónév vagy jelszó.',
        ])->withInput($request->only('username'));
    }
}
