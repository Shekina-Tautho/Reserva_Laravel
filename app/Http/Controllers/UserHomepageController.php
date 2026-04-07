<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelsModel;

class UserHomepageController extends Controller
{
    public function index() 
    {
        $hotels = HotelsModel::all();
        return view('pages.user.homepage', compact('hotels'));
    }
}
