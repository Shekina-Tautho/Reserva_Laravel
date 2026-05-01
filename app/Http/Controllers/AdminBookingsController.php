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
            'hotel_id'      => 'required|exists:hotel,hotel_id',
            'room_id'       => 'required|exists:room,room_id',
            'employee_id'   => 'required|exists:employee,employee_id',
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

        $booking->update([
            'user_id' => $request->user_id,
            'hotel_id' => $request->hotel_id,
            'room_id' => $request->room_id,
            'employee_id' => $request->employee_id,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'status' => $request->status,
        ]);

        // Prevent same-day check-in/out
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
            $validated['proof_image_path'] = $path;
        } else {
            $validated['proof_image_path'] = $booking->proof_image_path;
        }

        dd($validated);

        // Update booking with all validated + proof_image_path
        $booking->update($validated);

        // Notify if status changed
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
