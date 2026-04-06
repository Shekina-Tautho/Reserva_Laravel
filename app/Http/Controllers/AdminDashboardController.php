<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingModel;
use App\Models\User;


class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard');
    }
}
