@extends('layouts.admin.navbar')

@section('title', 'Reserva Admin | Bookings')

@section('content')
<div class="topbar">
    <div class="profile-initial">J</div>
    <span>John Doe [Admin]</span>
</div>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start mb-4">
    <div>
        <h2 class="fw-bold mb-2">Bookings</h2>
    </div>

    <!-- Button group -->
    <div class="mt-3 mt-md-4 d-flex gap-2 flex-wrap justify-content-md-end">
        <button class="btn btn-primary d-flex align-items-center gap-2">
            <img src="{{ asset('Assets/addicon.png') }}" alt="Add icon"> Add Booking
        </button>

        <button class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-funnel"></i> Filter by
            <i class="bi bi-caret-down-fill"></i>
        </button>

        <button class="btn btn-primary d-flex align-items-center gap-2">
            <i class="bi bi-sort-alpha-down"></i> Sort by
            <i class="bi bi-caret-down-fill"></i>
        </button>
    </div>
</div>

<!-- Bookings Table -->
<div class="tb-bookings-container reserva-shadow rounded-4 overflow-hidden">
    <table class="table align-middle table-hover mb-0 user-table">
        <thead class="table-light">
            <tr>
                <th scope="col" class="ps-3">ID</th>
                <th scope="col">Guest Name</th>
                <th scope="col">Hotel</th>
                <th scope="col">Check-In</th>
                <th scope="col">Check-Out</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <!-- Static rows for now -->
            <tr>
                <td>001</td>
                <td class="ps-3">Johnny Thor</td>
                <td>Radisson Blu</td>
                <td>2025-10-10</td>
                <td>2025-10-11</td>
                <td class="text-center">
                    <div class="action-icons">
                        <img src="{{ asset('Assets/previewicon.png') }}" alt="Preview icon">
                        <img src="{{ asset('Assets/editicon.png') }}" alt="Edit icon">
                        <img src="{{ asset('Assets/deleteicon.png') }}" alt="Delete icon">
                    </div>
                </td>
            </tr>
            <tr>
                <td>002</td>
                <td class="ps-3">Janette Dy</td>
                <td>Go Hotels</td>
                <td>2025-10-10</td>
                <td>2025-10-12</td>
                <td class="text-center">
                    <div class="action-icons">
                        <img src="{{ asset('Assets/previewicon.png') }}" alt="Preview icon">
                        <img src="{{ asset('Assets/editicon.png') }}" alt="Edit icon">
                        <img src="{{ asset('Assets/deleteicon.png') }}" alt="Delete icon">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
