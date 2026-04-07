<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelsModel;

class UserHotelSearchController extends Controller
{
    public function index() 
    {
        $hotels = HotelsModel::all();
        return view('pages.user.hotels', compact('hotels'));
    }
}
