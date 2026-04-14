<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class UserPaymentDetailsController extends Controller
{
    public function paymentdetails($id) 
    {
        $rooms = Room::find($id);
        $hotel = Hotel::where('hotel_id', $rooms->hotel_id)->value('name');
        $hoteladdress = Hotel::where('hotel_id', $rooms->hotel_id)->value('address');

        //store room and hotel data in session
        session([
            'room_id' => $rooms->id,
            'room_rates' => $rooms->room_rates,
            'hotel_id' => $rooms->hotel_id
        ]);

        return view('pages.user.paymentDetails', compact('rooms', 'hotel', 'hoteladdress'));
    }

    public function storeForm(Request $request) {
        $request->session()->put('room_id', session('room_id'));
        $request->session()->put('room_rates', session('room_id'));
        $request->session()->put('hotel_id', session('hotel_id'));
        $request->session()->put('check_in_date', $request->input('check_in_date'));
        $request->session()->put('check_out_date', $request->input('check_out_date'));
        $request->session()->put('request', $request->input('request'));

        return redirect()->route('UserPaymentVerificationRoute');
    }
}
