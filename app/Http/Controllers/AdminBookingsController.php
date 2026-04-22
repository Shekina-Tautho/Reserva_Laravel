<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookingModel;
use App\Models\User;
use App\Models\Employee;
use App\Models\Hotel;
use App\Models\Room;

class AdminBookingsController extends Controller
{
    public function index()
    {
        $bookings  = BookingModel::with(['user','hotel','room','employee'])->get();
        $users     = User::all();
        $hotels    = Hotel::all();
        $rooms     = Room::all();
        $employees = Employee::all();

        return view('pages.admin.booking', compact('bookings','users','hotels','rooms','employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,user_id',
            'hotel_id'      => 'required|exists:hotels,hotel_id',
            'room_id'       => 'required|exists:rooms,room_id',
            'employee_id'   => 'required|exists:employees,employee_id',
            'check_in_date' => ['required', 'date', 'after:today'],
            'check_out_date'=> ['required', 'date', 'after:check_in_date'],
            'proof_image'   => 'nullable|image',
            'status'        => 'required|in:Pending,Confirmed,Cancelled',
        ]);

        // Extra check: prevent same-day check-in and check-out
        $checkIn  = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        if ($checkOut->diffInDays($checkIn) < 1) {
            return back()->withErrors([
                'check_out_date' => 'Checkout must be at least the next day.',
            ]);
        }

        // Handle file upload
        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('proofs', 'public');
            $data['proof_image_path'] = $path; // save path in DB
        }

        BookingModel::create($data);

        return back()->with('success', 'Booking added successfully!');
    }

    public function update(Request $request, $id)
    {
        $booking = BookingModel::findOrFail($id);

        // Validate the incoming request
        $validated = $request->validate([
            'user_id'       => 'required|exists:users,user_id',
            'hotel_id'      => 'required|exists:hotel,hotel_id',
            'room_id'       => 'required|exists:room,room_id',
            'employee_id'   => 'nullable|exists:employee,employee_id',
            'check_in_date' => 'required|date',
            'check_out_date'=> 'required|date|after:check_in_date',
            'status'        => 'required|in:Pending,Confirmed,Cancelled',
            'proof_image'   => 'nullable|image|max:2048',
        ]);

        // Extra check: prevent same-day check-in and check-out
        $checkIn  = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        if ($checkOut->diffInDays($checkIn) < 1) {
            return back()->withErrors([
                'check_out_date' => 'Checkout must be at least the next day.',
            ]);
        }

        // If a new file is uploaded, store it
        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('proofs', 'public');
            $data['proof_image_path'] = $path;
        } else {
            // Keep the old path if no new file
            $data['proof_image_path'] = $booking->proof_image_path;
        }

        $booking->update($validated);

        // Notify the user when status changes
        if ($booking->wasChanged('status')) {
            $booking->user->notify(new \App\Notifications\BookingStatusChanged($booking));
        }

        return back()->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        BookingModel::findOrFail($id)->delete();
        return back()->with('success', 'Booking deleted successfully!');
    }
}
