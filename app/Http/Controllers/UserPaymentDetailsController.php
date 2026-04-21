<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\BookingModel;
use Carbon\Carbon; #To calculate number of nights between dates

class UserPaymentDetailsController extends Controller
{
    public function paymentdetails($id) 
    {
        $rooms = Room::find($id);
        $hotel = Hotel::where('hotel_id', $rooms->hotel_id)->value('name');
        $hotelCity = Hotel::where('hotel_id', $rooms->hotel_id)->first()->address->locality;
        $hotelCountry = Hotel::where('hotel_id', $rooms->hotel_id)->first()->address->country;

        //store room and hotel data in session
        /*
        session([
            'room_id' => $rooms->id,
            'room_rates' => $rooms->room_rates,
            'hotel_id' => $rooms->hotel_id
        ]);
        */

        return view('pages.user.paymentDetails', compact('rooms', 'hotel', 'hotelCity', 'hotelCountry'));
    }
    

    //STORE DATA
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'hotel_id' => 'required|exists:hotel,hotel_id',
            'room_id' => 'required|exists:room,room_id',
            #'employee_id' => 'nullable',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'request' => 'nullable|string',
            #'proof_image_path' => 'nullable',
            'status' => 'nullable|string',
        ]);

        $checkInDate = Carbon::parse($validated['check_in_date']);
        $checkOutDate = Carbon::parse($validated['check_out_date']);
        $numberOfNights = $checkInDate->diffInDays($checkOutDate);
        $totalAmount = $numberOfNights * Room::where('room_id', $validated['room_id'])->value('room_rates');

        $validated['employee_id'] = null;
        $validated['total_amount'] = $totalAmount;
        $validated['proof_image_path'] = null;

        BookingModel::create($validated);

        return redirect()->route('UserPaymentVerificationRoute', ['id' => BookingModel::latest()->first()->booking_id])
                         ->with('success', 'Booking made successfully!');
    }

    /*
    public function storeForm(Request $request) {
        $request->session()->put('room_id', session('room_id'));
        $request->session()->put('room_rates', session('room_id'));
        $request->session()->put('hotel_id', session('hotel_id'));
        $request->session()->put('check_in_date', $request->input('check_in_date'));
        $request->session()->put('check_out_date', $request->input('check_out_date'));
        $request->session()->put('request', $request->input('request'));

        return redirect()->route('UserPaymentVerificationRoute');
    }
        */
}
