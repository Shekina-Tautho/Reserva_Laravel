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

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,booking_id',
            'proof_image' => 'required|image',
        ]);

        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('proofs', 'public');
            
            // Update the existing booking
            $booking = BookingModel::findOrFail($request->booking_id);
            $booking->update(['proof_image_path' => $path]);
        }

        return back()->with('success', 'Image uploaded successfully!');

        /*
        $request->validate([
            'proof_image' => 'required|image',
        ]);

        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('proofs', 'public');
            $data['proof_image_path'] = $path;
        }

        BookingModel::create($data);

        return back()->with('success', 'Image uploaded successfully!');
        */
    }
}