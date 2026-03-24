<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.user.homepage');
});

Route::get('/hotels', function () {
    return view('pages.user.hotels');
});

Route::get('/booking', function () {
    return view('pages.user.booking');
});

Route::get('/paymentdetails', function () {
    return view('pages.user.paymentDetails');
});

Route::get('/paymentverification', function () {
    return view('pages.user.paymentVerification');
});

Route::get('/contacts', function () {
    return view('pages.user.contacts');
});
