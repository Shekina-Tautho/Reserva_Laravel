<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountCreationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookingsController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\UserHomepageController;
use App\Http\Controllers\UserHotelSearchController;
use App\Http\Controllers\UserBookingController;
use App\Http\Controllers\UserPaymentDetailsController;
use App\Http\Controllers\UserPaymentVerificationController;
use App\Http\Controllers\UserReservationsController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\UserContactsController;

#Login and Create Account
Route::get('/', [LoginController::class, 'index']);
Route::get('/AccountCreation', [AccountCreationController::class, 'index']);

#Admin Pages
Route::get('/AdminDashboard', [AdminDashboardController::class, 'index']);
Route::get('/AdminBookings', [AdminBookingsController::class, 'index']);
Route::get('/AdminUserManagement', [AdminUserManagementController::class, 'index']);

#User Pages
Route::get('/UserHomepage', [UserHomepageController::class, 'index'])->name('UserHomepageRoute');
Route::get('/UserHotelSearch', [UserHotelSearchController::class, 'index'])->name('UserHotelSearchRoute');
Route::get('/UserBooking', [UserBookingController::class, 'index'])->name('UserBookingRoute');
Route::get('/UserPaymentDetails', [UserPaymentDetailsController::class, 'index'])->name('UserPaymentDetailsRoute');
Route::get('/UserPaymentVerification', [UserPaymentVerificationController::class, 'index'])->name('UserPaymentVerificationRoute');
Route::get('/UserReservations', [UserReservationsController::class, 'index'])->name('UserReservationsRoute');
Route::get('/UserAccount', [UserAccountController::class, 'index'])->name('UserAccountRoute');
Route::get('/UserContacts', [UserContactsController::class, 'index'])->name('UserContactsRoute');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/'); // or wherever you want to send users after logout
})->name('logout');
