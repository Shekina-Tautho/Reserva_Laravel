<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data = $request->all();

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

        $data = $request->all();

        // If a new file is uploaded, store it
        if ($request->hasFile('proof_image')) {
            $path = $request->file('proof_image')->store('proofs', 'public');
            $data['proof_image_path'] = $path;
        } else {
            // Keep the old path if no new file
            $data['proof_image_path'] = $booking->proof_image_path;
        }

        $booking->update($data);

        return back()->with('success', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        BookingModel::findOrFail($id)->delete();
        return back()->with('success', 'Booking deleted successfully!');
    }
}
