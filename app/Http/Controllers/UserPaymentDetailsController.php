<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPaymentDetailsController extends Controller
{
    public function index() 
    {
        return view('pages.user.paymentDetails');
    }
}
