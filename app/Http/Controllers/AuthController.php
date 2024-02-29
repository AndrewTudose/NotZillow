<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function create() //| Display form
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request) //| create session if login and pass is correct | sign user in
    {

        if (!Auth::attempt(
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]),
            true
        )) {
            throw ValidationException::withMessages([
                'email' => 'Authentification failed'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('/listing');
    }

    public function destroy(Request $request) // destroy session | logout
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended('/listing');
    }
}
