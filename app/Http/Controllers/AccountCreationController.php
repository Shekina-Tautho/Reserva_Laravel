<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use App\Models\User;
class AccountCreationController extends Controller
{
    public function index() {
        return view('pages.register');
    }

    public function store(Request $request) {
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'first_name' => 'required|max:255|string',
            'last_name' => 'required|max:255|string',
            'phone_no' => 'regex:/^093\d{9}$/|required|max:255|string'
        ]);        

        User::create($user);
        return redirect()->route('login')->with('success', 'account created successfully.');
    }
}
