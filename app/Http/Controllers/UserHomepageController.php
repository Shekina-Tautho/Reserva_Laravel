<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomepageController extends Controller
{
    public function index() 
    {
        return view('pages.user.homepage');
    }
}
