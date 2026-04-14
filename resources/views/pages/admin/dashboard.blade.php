@extends('layouts.admin.navbar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>

    <!-- Topbar -->
    <div class="topbar d-flex align-items-center justify-content-end">
        <div class="profile-initial">
            {{ strtoupper(substr(Auth::guard('employee')->user()->first_name, 0, 1)) }}
        </div>
    </div>


    <!-- Dashboard Stats -->
    <h2 class="fw-bold mb-2">Dashboard</h2>
    <div class="row g-4 pt-3 pb-5">
        <div class="col-md-4">
            <div class="dashboard-data-card text-center p-3 reserva-shadow rounded-4">
                <i class="bi bi-calendar-check display-4"></i>
                <h5>Total Bookings</h5>
                <h4 class="fw-bold">{{ $totalBookings }}</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-data-card text-center p-3 reserva-shadow rounded-4">
                <i class="bi bi-hourglass-split display-4"></i>
                <h5>Pending Bookings</h5>
                <h4 class="fw-bold">{{ $pendingBookings }}</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-data-card text-center p-3 reserva-shadow rounded-4">
                <i class="bi bi-people display-4"></i>
                <h5>Users</h5>
                <h4 class="fw-bold">{{ $totalUsers }}</h4>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <h2 class="fw-bold mb-2">Recent Bookings</h2>
    <div class="tb-dashboard-container my-5 reserva-shadow rounded-4 overflow-hidden">
        <table class="table align-middle table-hover mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="ps-3">ID</th>
                    <th scope="col">Guest Name</th>
                    <th scope="col">Hotel</th>
                    <th scope="col">Check-In</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentBookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td class="ps-3">{{ $booking->guest_name }}</td>
                        <td>{{ $booking->hotel_name }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>
                            <span class="badge bg-{{ $booking->status === 'active' ? 'success' : 'warning' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('bookings.show', $booking->id) }}"><i class="bi bi-eye text-primary"></i></a>
                                <a href="{{ route('bookings.edit', $booking->id) }}"><i class="bi bi-pencil text-warning"></i></a>
                                <form action="{{ route('bookings.delete', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0"><i class="bi bi-trash text-danger"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
