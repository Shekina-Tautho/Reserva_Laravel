<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountCreationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookingsController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\UserHomepageController;
use App\Http\Controllers\UserHotelSearchController;
use App\Http\Controllers\UserHotelsController;
use App\Http\Controllers\UserReservationsController;
use App\Http\Controllers\UserContactsController;
use App\Http\Controllers\UserAccountController;

#Login and Create Account
Route::get('/', [LoginController::class, 'index']);
Route::get('/AccountCreation', [AccountCreationController::class, 'index']);

#Admin Pages
Route::get('/AdminDashboard', [AdminDashboardController::class, 'index']);
Route::get('/AdminBookings', [AdminBookingsController::class, 'index']);
Route::get('/AdminUserManagement', [AdminUserManagementController::class, 'index']);

#User Pages
Route::get('/UserHomePage', [UserHomePageController::class, 'index']);
Route::get('/UserHotelSearch', [UserHotelSearchController::class, 'index']);
Route::get('/UserHotels', [UserHotelsController::class, 'index']);
Route::get('/UserReservations', [UserReservationsController::class, 'index']);
Route::get('/UserContacts', [UserContactsController::class, 'index']);
Route::get('/UserAccount', [UserAccountController::class, 'index']);