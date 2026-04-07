@extends('layouts.admin.navbar')

@section('title', 'Reserva Admin | Bookings')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start mb-4">
    <div>
        <h2 class="fw-bold mb-2">Bookings</h2>
    </div>

    <!-- Button group -->
    <div class="mt-3 mt-md-4 d-flex gap-2 flex-wrap justify-content-md-end">
        <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addBookingModal">
            <img src="{{ asset('Assets/addicon.png') }}" alt=""> Add Booking
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
                <th scope="col">Status</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $booking)
            <tr>
                <td>{{ $booking->booking_id }}</td>
                <td class="ps-3">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                <td>{{ $booking->hotel->name }}</td>
                <td>{{ $booking->check_in_date }}</td>
                <td>{{ $booking->check_out_date }}</td>
                <td>
                    <span class="badge {{ $booking->status == 'Confirmed' ? 'bg-success' : 'bg-warning' }}">
                        {{ $booking->status }}
                    </span>
                </td>

                <td class="text-center">
                    <div class="action-icons d-flex gap-2 justify-content-center">

                        <!-- EDIT -->
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBookingModal{{ $booking->booking_id }}">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <!-- DELETE -->
                        <form action="{{ route('bookings.delete', $booking->booking_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>

            @empty
            <tr><td colspan="7" class="text-center">No bookings found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- ADD BOOKING MODAL -->
<div class="modal fade" id="addBookingModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bookings.store') }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Add Booking</h5></div>
            <div class="modal-body">
                <select name="user_id" class="form-control mb-2" required>
                    <option value="">Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                    @endforeach
                </select>

                <select name="hotel_id" class="form-control mb-2" required>
                    <option value="">Select Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotel_id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>

                <select name="room_id" class="form-control mb-2" required>
                    <option value="">Select Room</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->room_id }}">{{ $room->room_type }}</option>
                    @endforeach
                </select>

                <select name="employee_id" class="form-control mb-2" required>
                    <option value="">Assign Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>

                <!-- other fields -->
                <input type="date" name="check_in_date" class="form-control mb-2" required>
                <input type="date" name="check_out_date" class="form-control mb-2" required>

                <input type="file" name="proof_image" class="form-control mb-2" accept="image/*">

                <select name="status" class="form-control mb-2">
                    <option>Pending</option>
                    <option>Confirmed</option>
                    <option>Cancelled</option>
                </select>

            </div>

            <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- EDIT BOOKING MODALS -->
@foreach($bookings as $booking)
<div class="modal fade" id="editBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bookings.update', $booking->booking_id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header"><h5>Edit Booking</h5></div>
            <div class="modal-body">
                <select name="user_id" class="form-control mb-2" required>
                    @foreach($users as $user)
                        <option value="{{ $user->user_id }}" {{ $booking->user_id == $user->user_id ? 'selected' : '' }}>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </option>
                    @endforeach
                </select>
                
                <select name="hotel_id" class="form-control mb-2" required>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotel_id }}" {{ $booking->hotel_id == $hotel->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>

                <select name="room_id" class="form-control mb-2" required>
                    @foreach($rooms as $room)
                        <option value="{{ $room->room_id }}" {{ $booking->room_id == $room->room_id ? 'selected' : '' }}>
                            {{ $room->room_type }}
                        </option>
                    @endforeach
                </select>

                <select name="employee_id" class="form-control mb-2" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}" {{ $booking->employee_id == $employee->employee_id ? 'selected' : '' }}>
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </select>

                <!-- other fields -->
                <input type="date" name="check_in_date" class="form-control mb-2" required>
                <input type="date" name="check_out_date" class="form-control mb-2" required>

                <input type="file" name="proof_image" class="form-control mb-2" accept="image/*">

                <select name="status" class="form-control mb-2">
                    <option>Pending</option>
                    <option>Confirmed</option>
                    <option>Cancelled</option>
                </select>

                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection
