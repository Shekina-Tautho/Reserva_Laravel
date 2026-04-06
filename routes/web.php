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

// routes as /route-name (small letters, snakecase)
# Login and Create Account  
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AccountCreationController::class, 'index'])->name('register');
Route::post('/register', [AccountCreationController::class, 'store'])->name('register.post');
/* /admin/dashboard, middleware = check if auth is valid and role is admin
Route::prefix('/admin')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);
    Route::get('/booking', [AdminBookingsController::class, 'index']);
    Route::get('/user-management', [AdminUserManagementController::class, 'index']);
})
*/
#Admin Pages

Route::get('/AdminDashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/AdminBookings', [AdminBookingsController::class, 'index']);
Route::get('/AdminUserManagement', [AdminUserManagementController::class, 'index'])->name('admin.user_management');
#User, admin side
Route::post('/users/store', [AdminUserManagementController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [AdminUserManagementController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [AdminUserManagementController::class, 'destroy'])->name('users.delete');
#Employee, admin side
Route::post('/employees', [AdminUserManagementController::class, 'storeEmployee'])->name('employees.store');
Route::put('/employees/{id}', [AdminUserManagementController::class, 'updateEmployee'])->name('employees.update');
Route::delete('/employees/{id}', [AdminUserManagementController::class, 'destroyEmployee'])->name('employees.delete');

#User Pages
Route::get('/UserHomepage', [UserHomepageController::class, 'index'])->name('user.homepage');
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
