<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class AdminHotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('pages.admin.hotel', compact('hotels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'overview' => 'nullable|string',
            'address'  => 'required|string|max:255',
        ]);

        Hotel::create($validated);

        return back()->with('success', 'Hotel added successfully!');
    }

    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'overview' => 'nullable|string',
            'address'  => 'required|string|max:255',
        ]);

        $hotel->update($validated);

        return back()->with('success', 'Hotel updated successfully!');
    }

    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return back()->with('success', 'Hotel deleted successfully!');
    }
}
