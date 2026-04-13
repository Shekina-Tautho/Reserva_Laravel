<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

# User Login and Register
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AccountCreationController::class, 'index'])->name('register');
Route::post('/register', [AccountCreationController::class, 'store'])->name('register.post');

# Employee Login
Route::get('/employee/login', [LoginController::class, 'index'])->name('employee.login');
Route::post('/employee/login', [LoginController::class, 'authenticateEmployee'])->name('employee.login.post');

/* /admin/dashboard, middleware = check if auth is valid and role is admin */
Route::prefix('/admin')->middleware('employee.access')->group(function() {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/booking', [AdminBookingsController::class, 'index'])->name('admin.booking');
    Route::get('/user-management', [AdminUserManagementController::class, 'index'])->name('admin.user_management');
    Route::post('/bookings/store', [AdminBookingsController::class, 'store'])->name('bookings.store');
    Route::put('/bookings/{id}', [AdminBookingsController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [AdminBookingsController::class, 'destroy'])->name('bookings.delete');
    Route::post('/users/store', [AdminUserManagementController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [AdminUserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [AdminUserManagementController::class, 'destroy'])->name('users.delete');
    Route::post('/employees', [AdminUserManagementController::class, 'storeEmployee'])->name('employees.store');
    Route::put('/employees/{id}', [AdminUserManagementController::class, 'updateEmployee'])->name('employees.update');
    Route::delete('/employees/{id}', [AdminUserManagementController::class, 'destroyEmployee'])->name('employees.delete');
});

# User Pages (protected by user guard)
Route::middleware('auth:web')->group(function() {
    Route::get('/userhomepage', [UserHomepageController::class, 'index'])->name('user.homepage');
    Route::get('/userhotelsearch', [UserHotelSearchController::class, 'index'])->name('UserHotelSearchRoute');
    Route::get('/userbooking', [UserBookingController::class, 'index'])->name('UserBookingRoute');
    Route::get('/userpaymentdetails', [UserPaymentDetailsController::class, 'index'])->name('UserPaymentDetailsRoute');
    Route::get('/userpaymentverification', [UserPaymentVerificationController::class, 'index'])->name('UserPaymentVerificationRoute');
    Route::get('/userreservations', [UserReservationsController::class, 'index'])->name('UserReservationsRoute');
    Route::get('/useraccount', [UserAccountController::class, 'index'])->name('UserAccountRoute');
    Route::get('/usercontacts', [UserContactsController::class, 'index'])->name('UserContactsRoute');
});

# Logout (handles both guards)
Route::post('/logout', function (Request $request) {
    if (Auth::guard('employee')->check()) {
        Auth::guard('employee')->logout();
    } elseif (Auth::guard('web')->check()) {
        Auth::guard('web')->logout();
    }
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
