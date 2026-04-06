<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('pages.login');
    }

    public function authenticate(Request $request) {
        $creds = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($creds)) {
            $request->session()->regenerate();
            return redirect()->route(Auth::user()->role == 'admin' ? 'admin.dashboard' : 'user.homepage');
        }

        return back()->withErrors([
            'email' => 'Invalid Email Credentials'
        ])->onlyInput('email');
    }
}
