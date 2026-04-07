<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Stats
        $totalBookings = BookingModel::count();
        $totalUsers = User::count();
        $pendingBookings = BookingModel::where('status', 'pending')->count();

        // Recent bookings (latest 5)
        $recentBookings = BookingModel::latest()->take(5)->get();

        return view('pages.admin.dashboard', compact(
            'totalBookings',
            'totalUsers',
            'pendingBookings',
            'recentBookings'
        ));
    }
}
