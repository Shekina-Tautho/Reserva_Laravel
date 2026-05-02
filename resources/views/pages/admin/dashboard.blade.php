@extends('layouts.admin.navbar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>

    <!-- Topbar -->
    <div class="topbar d-flex align-items-center justify-content-end">
        <div class="profile-initial">
            {{ strtoupper(substr(Auth::guard('employee')->user()->first_name, 0, 1)) }}
        </div>
        <span class="text-dark">{{ Auth::guard('employee')->user()->first_name }}</span>
    </div>


    <!-- Dashboard Stats -->
    <h2 class="fw-bold mb-2">Dashboard</h2>
    <div class="row g-3 g-md-4 pt-3 pb-4">

        <div class="col-12 col-md-4">
            <div class="dashboard-data-card text-center p-3 reserva-shadow rounded-4 h-100">
                <i class="bi bi-calendar-check display-4"></i>
                <h5>Total Bookings</h5>
                <h4 class="fw-bold">{{ $totalBookings }}</h4>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="dashboard-data-card text-center p-3 reserva-shadow rounded-4 h-100">
                <i class="bi bi-hourglass-split display-4"></i>
                <h5>Pending Bookings</h5>
                <h4 class="fw-bold">{{ $pendingBookings }}</h4>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="dashboard-data-card text-center p-3 reserva-shadow rounded-4 h-100">
                <i class="bi bi-people display-4"></i>
                <h5>Users</h5>
                <h4 class="fw-bold">{{ $totalUsers }}</h4>
            </div>
        </div>

    </div>

    <!-- Recent Bookings -->
    <h2 class="fw-bold mb-2">Recent Bookings</h2>
    <div class="tb-dashboard-container my-4 my-md-5 reserva-shadow rounded-4 overflow-hidden d-none d-md-block">
        <table class="table align-middle mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="ps-3">ID</th>
                    <th scope="col">Guest Name</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Check-In</th>
                    <th scope="col">Check-Out</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recentBookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td class="ps-3">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                        <td>{{ $booking->hotel->name }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>
                            <span class="badge 
                                {{ $booking->status === 'Confirmed' ? 'bg-success' : '' }}
                                {{ $booking->status === 'Pending'   ? 'bg-warning' : '' }}
                                {{ $booking->status === 'Cancelled' ? 'bg-danger'  : '' }}">
                                {{ $booking->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- MOBILE RECENT BOOKINGS -->
    <div class="d-block d-md-none">

    @foreach($recentBookings as $booking)
        <div class="card mb-4 shadow-sm border-0 rounded-4">
            <div class="card-body">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h6 class="mb-1 fw-bold">
                            #{{ $booking->booking_id }}
                        </h6>
                        <small class="text-muted">
                            {{ $booking->user->first_name }} {{ $booking->user->last_name }}
                        </small>
                    </div>

                    <span class="badge 
                        {{ $booking->status === 'Confirmed' ? 'bg-success' : '' }}
                        {{ $booking->status === 'Pending' ? 'bg-warning' : '' }}
                        {{ $booking->status === 'Cancelled' ? 'bg-danger' : '' }}">
                        {{ $booking->status }}
                    </span>
                </div>

                <!-- Details -->
                <div class="small text-muted">
                    <div class="mb-1">
                        <strong>Hotel:</strong> {{ $booking->hotel->name }}
                    </div>

                    <div class="mb-1">
                        <strong>Check-In:</strong> {{ $booking->check_in_date }}
                    </div>

                    <div>
                        <strong>Check-Out:</strong> {{ $booking->check_out_date }}
                    </div>
                </div>

            </div>
        </div>
    @endforeach
    </div>

@endsection
