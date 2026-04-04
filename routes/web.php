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
Route::get('/UserReservations', [UserReservationsController::class, 'index'])->name('UserReservationsRoute');
Route::get('/UserAccount', [UserAccountController::class, 'index'])->name('UserAccountRoute');
Route::get('/UserContacts', [UserContactsController::class, 'index'])->name('UserContactsRoute');
