<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\BookingModel;
use Carbon\Carbon;

class UserPaymentVerificationController extends Controller
{
    public function verificationDetails($id)
    {
        $booking = BookingModel::find($id);
        $check_in_date = $booking->check_in_date;
        $check_out_date = $booking->check_out_date;
        $checkInDay = Carbon::parse($check_in_date)->format('D');
        $checkOutDay = Carbon::parse($check_out_date)->format('D');
        $checkInDate = Carbon::parse($check_in_date)->format('D d M Y');
        $checkOutDate = Carbon::parse($check_out_date)->format('D d M Y');
        $numberOfNights = Carbon::parse($check_in_date)->diffInDays(Carbon::parse($check_out_date));
        $room_rates = Room::where('room_id', $booking->room_id)->value('room_rates');
        $total_amount = $numberOfNights * $room_rates;
        $hotel_name = Hotel::where('hotel_id', $booking->hotel_id)->value('name');
        $hotel_img = Hotel::where('hotel_id', $booking->hotel_id)->value('image_path');

        return view('pages.user.paymentVerification', compact('checkInDay', 'checkOutDay', 'checkInDate', 'checkOutDate', 'numberOfNights', 'room_rates', 'total_amount', 'hotel_img', 'hotel_name'));
    }

    /*
    public function index() {
        // Retrieve individual session values
        $room_id = session('room_id');
        $room_rates = session('room_rates');
        $hotel_id = session('hotel_id');
        $check_in_date = session('check_in_date');
        $check_out_date = session('check_out_date');
        

        return view('pages.user.paymentVerification', compact('room_id', 'room_rates', 'hotel_id', 'check_in_date', 'check_out_date'));
    }
    */
}
