<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountCreationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBookingsController;
use App\Http\Controllers\AdminUserManagementController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\UserHotelSearchController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\UserReservationsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UserAccountController;

#Login and Create Account
Route::get('/', [LoginController::class, 'index']);
Route::get('/AccountCreation', [AccountCreationController::class, 'index']);

#Admin Pages
Route::get('/AdminDashboard', [AdminDashboardController::class, 'index']);
Route::get('/AdminBookings', [AdminBookingsController::class, 'index']);
Route::get('/AdminUserManagement', [AdminUserManagementController::class, 'index']);

#User Pages
Route::get('/Homepage', [HomepageController::class, 'index']);
Route::get('/UserHotelSearch', [UserHotelSearchController::class, 'index']);
Route::get('/Hotels', [HotelsController::class, 'index']);
Route::get('/UserReservations', [UserReservationsController::class, 'index']);
Route::get('/Contacts', [ContactsController::class, 'index']);
Route::get('/UserAccount', [UserAccountController::class, 'index']);
