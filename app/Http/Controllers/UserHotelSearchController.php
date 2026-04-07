<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class UserHotelSearchController extends Controller
{
    public function index() 
    {
        $hotels = Hotel::all();
        return view('pages.user.hotels', compact('hotels'));
    }
}
