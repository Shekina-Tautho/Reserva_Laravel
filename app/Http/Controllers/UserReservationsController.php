<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookingModel;

class UserReservationsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $bookings = BookingModel::where('user_id', auth()->user()->user_id)->get();
        return view('pages.user.userbookings', compact('users', 'bookings'));
    }
}