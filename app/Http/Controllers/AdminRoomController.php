<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Hotel;

class AdminRoomController extends Controller
{
    /**
     * Display all rooms
     */
    public function index()
    {
        $rooms = Room::with('hotel')->get();
        $hotels = Hotel::all();

        return view('pages.admin.room', compact('rooms', 'hotels'));
    }

    /**
     * Store new room
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id'   => 'required|exists:hotel,hotel_id',
            'room_type'  => 'required|string|max:255',
            'capacity'   => 'nullable|string|max:255',
            'amenities'  => 'nullable|string|max:255',
            'no_of_beds' => 'nullable|string|max:255',
            'room_rates' => 'required|numeric|min:0',
        ]);

        Room::create($validated);

        return back()->with('success', 'Room added successfully!');
    }

    /**
     * Update room
     */
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $validated = $request->validate([
            'hotel_id'   => 'required|exists:hotel,hotel_id',
            'room_type'  => 'required|string|max:255',
            'capacity'   => 'nullable|string|max:255',
            'amenities'  => 'nullable|string|max:255',
            'no_of_beds' => 'nullable|string|max:255',
            'room_rates' => 'required|numeric|min:0',
        ]);

        $room->update($validated);

        return back()->with('success', 'Room updated successfully!');
    }

    /**
     * Delete room
     */
    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return back()->with('success', 'Room deleted successfully!');
    }

    public function getRoomsByHotel($hotel_id)
    {
        $rooms = Room::where('hotel_id', $hotel_id)->get(['room_id','room_type']);
        return response()->json($rooms);
    }
}