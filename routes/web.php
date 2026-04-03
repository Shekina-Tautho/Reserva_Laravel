<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountCreationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookingsController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\UserHomepageController;
use App\Http\Controllers\UserHotelSearchController;
use App\Http\Controllers\UserReservationsController;
use App\Http\Controllers\UserAccountController;

#Login and Create Account
Route::get('/', [LoginController::class, 'index']);
Route::get('/AccountCreation', [AccountCreationController::class, 'index']);

#Admin Pages
Route::get('/AdminDashboard', [AdminDashboardController::class, 'index']);
Route::get('/AdminBookings', [AdminBookingsController::class, 'index']);
Route::get('/AdminUserManagement', [AdminUserManagementController::class, 'index']);

#User Pages
Route::get('/UserHomepage', [UserHomepageController::class, 'index'])->name('UserHomepageRoute');
#Route::get('/Homepage', [HomepageController::class, 'index']);
Route::get('/UserHotelSearch', [UserHotelSearchController::class, 'index']);
#Route::get('/Hotels', [HotelsController::class, 'index']);
Route::get('/UserReservations', [UserReservationsController::class, 'index']);
#Route::get('/Contacts', [ContactsController::class, 'index']);
Route::get('/UserAccount', [UserAccountController::class, 'index']);



#pages that don't use controller as of now for presentation purposes
#Route::get('/homepage', function() {
#    return view('pages.user.homepage');
#});

Route::get('/hotels', function() {
    return view('pages.user.hotels');
});

Route::get('/booking', function() {
    return view('pages.user.booking');
});

Route::get('/paymentdetails', function() {
    return view('pages.user.paymentDetails');
});

Route::get('/paymentverification', function() {
    return view('pages.user.paymentVerification');
});

Route::get('/contacts', function() {
    return view('pages.user.contacts');
});