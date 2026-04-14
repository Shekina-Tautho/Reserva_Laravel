<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class UserPaymentVerificationController extends Controller
{
    public function index() 
    {
        // Retrieve individual session values
        $room_id = session('room_id');
        $room_rates = session('room_rates');
        $hotel_id = session('hotel_id');
        $check_in_date = session('check_in_date');
        $check_out_date = session('check_out_date');

        return view('pages.user.paymentVerification', compact('room_id', 'room_rates', 'hotel_id', 'check_in_date', 'check_out_date'));
    }
}
