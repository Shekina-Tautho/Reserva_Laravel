<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class UserHotelsController extends Controller
{
    public function hoteldetails($id) 
    {
        $hotels = Hotel::find($id);
        $rooms = Room::all();
        return view('pages.user.hoteldetails', compact('hotels'));
    }
}
