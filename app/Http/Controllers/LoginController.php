<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt($credentials)) {
            // Authentication passed
            $isAdmin = auth()->user()->is_admin;
            if ($isAdmin) { 
                session(['username' => 'admin']);
                session(['is_admin' => true]);
            } else {
                session(['username' => 'posluchač']);
                session(['is_admin' => false]);
            }
            return redirect()->intended('/home');
        }

        // Authentication failed
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function register(Request $request) {
        // Registration logic here
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }
}
