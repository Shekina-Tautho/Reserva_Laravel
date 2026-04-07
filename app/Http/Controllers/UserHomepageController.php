<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class UserHomepageController extends Controller
{
    public function index() 
    {
        $hotels = Hotel::all();
        return view('pages.user.homepage', compact('hotels'));
    }
}
