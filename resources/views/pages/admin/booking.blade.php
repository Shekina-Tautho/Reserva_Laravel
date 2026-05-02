@extends('layouts.admin.navbar')

@section('title', 'Reserva Admin | Bookings')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>

<!-- Topbar -->
<div class="topbar d-flex align-items-center justify-content-end">
    <div class="profile-initial">
        {{ strtoupper(substr(Auth::guard('employee')->user()->first_name, 0, 1)) }}
    </div>
    <span class="text-dark">{{ Auth::guard('employee')->user()->first_name }}</span>
</div>

<!-- HEADER -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-2 mb-4">
    <div>
        <h2 class="fw-bold mb-2">Bookings</h2>
    </div>

    <div class="mt-3 mt-md-4 d-flex gap-2 flex-wrap justify-content-start justify-content-md-end w-100">
        <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addBookingModal">
            <img src=""> Add Booking
        </button>
    </div>
</div>

<!-- TABLE -->
<div class="tb-bookings-container reserva-shadow rounded-4 overflow-hidden d-none d-md-block">
    <div class="table-responsive">
        <table class="table align-middle table-hover mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Guest Name</th>
                    <th>Hotel</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->booking_id }}</td>
                    <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                    <td>{{ $booking->hotel->name }}</td>
                    <td>{{ $booking->check_in_date }}</td>
                    <td>{{ $booking->check_out_date }}</td>
                    <td>
                        <span class="badge 
                            {{ $booking->status === 'Confirmed' ? 'bg-success' : '' }}
                            {{ $booking->status === 'Pending' ? 'bg-warning' : '' }}
                            {{ $booking->status === 'Cancelled' ? 'bg-danger' : '' }}">
                            {{ $booking->status }}
                        </span>
                    </td>

                    <td class="text-center">
                        <div class="action-icons d-flex gap-2 justify-content-center flex-wrap">

                            <!-- PREVIEW -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                                <img src="{{ asset('/images/previewicon.png') }}">
                            </button>

                            <!-- EDIT -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#editBookingModal{{ $booking->booking_id }}">
                                <img src="{{ asset('/images/editicon.png') }}">
                            </button>

                            <!-- DELETE -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#deleteBookingModal{{ $booking->booking_id }}">
                                <img src="{{ asset('/images/deleteicon.png') }}">
                            </button>

                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center">No bookings found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD MODAL -->
<div class="modal fade" id="addBookingModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bookings.store') }}" enctype="multipart/form-data" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5>Add Booking</h5>
            </div>

            <div class="modal-body">
                <div class="row g-2">

                    <div class="col-12">
                        <select name="user_id" class="form-control" required>
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <select name="hotel_id" id="hotelSelect" class="form-control" required>
                            <option value="">Select Hotel</option>
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->hotel_id }}">{{ $hotel->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <select name="room_id" id="roomSelect" class="form-control" required>
                            <option value="">Select Room</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <input type="date" name="check_in_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-6">
                        <input type="date" name="check_out_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="col-12">
                        <select name="employee_id" class="form-control" required>
                            <option value="">Assign Employee</option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <input type="file" name="proof_image" class="form-control" accept="image/*">
                    </div>

                    <div class="col-12">
                        <select name="status" class="form-control">
                            <option>Pending</option>
                            <option>Confirmed</option>
                            <option>Cancelled</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
</div>

<!-- PREVIEW -->
@foreach($bookings as $booking)
<div class="modal fade" id="previewBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Booking Preview</h5>
            </div>

            <div class="modal-body">
                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <p><strong>Guest:</strong> {{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                        <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                        <p><strong>Phone:</strong> {{ $booking->user->phone_no }}</p>
                        <p><strong>Hotel:</strong> {{ $booking->hotel->name }}</p>
                        <p><strong>Room:</strong> {{ $booking->room->room_type }}</p>
                        <p><strong>Employee:</strong> {{ $booking->employee->first_name ?? '' }} {{ $booking->employee->last_name ?? '' }}</p>
                        <p><strong>Check-In:</strong> {{ $booking->check_in_date }}</p>
                        <p><strong>Check-Out:</strong> {{ $booking->check_out_date }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge {{ $booking->status == 'Confirmed' ? 'bg-success' : ($booking->status == 'Cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $booking->status }}
                            </span>
                        </p>
                    </div>

                    <div class="col-12 col-md-6 text-center">
                        @if($booking->proof_image_path)
                            <img src="{{ asset('storage/' . $booking->proof_image_path) }}" class="img-fluid rounded shadow">
                        @else
                            <p class="text-muted">No proof image</p>
                        @endif
                    </div>

                    <div class="modal-footer d-flex justify-content-end">
                        <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endforeach

<!-- EDIT -->
@foreach($bookings as $booking)
<div class="modal fade" id="editBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bookings.update', $booking->booking_id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5>Edit Booking</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-2">

                    <div class="col-12">
                        <select name="user_id" class="form-control">
                            @foreach($users as $user)
                                <option value="{{ $user->user_id }}" {{ $booking->user_id == $user->user_id ? 'selected' : '' }}>
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <select name="hotel_id" id="hotelSelect{{ $booking->booking_id }}" class="form-control">
                            @foreach($hotels as $hotel)
                                <option value="{{ $hotel->hotel_id }}" {{ $booking->hotel_id == $hotel->hotel_id ? 'selected' : '' }}>
                                    {{ $hotel->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <select name="room_id" id="roomSelect{{ $booking->booking_id }}" class="form-control" data-selected="{{ $booking->room_id }}">
                            <option>Loading...</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <input type="date" name="check_in_date" class="form-control" value="{{ $booking->check_in_date }}">
                    </div>

                    <div class="col-6">
                        <input type="date" name="check_out_date" class="form-control" value="{{ $booking->check_out_date }}">
                    </div>

                    <div class="col-12">
                        <select name="employee_id" class="form-control">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->employee_id }}" {{ $booking->employee_id == $employee->employee_id ? 'selected' : '' }}>
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <select name="status" class="form-control">
                            <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>
@endforeach

<!-- DELETE -->
@foreach($bookings as $booking)
<div class="modal fade" id="deleteBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Confirm Delete</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Are you sure you want to delete booking #{{ $booking->booking_id }}?
            </div>

            <div class="modal-footer">
                <form method="POST" action="{{ route('bookings.delete', $booking->booking_id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>

                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>

        </div>
    </div>
</div>
@endforeach

<!-- MOBILE CARD VIEW -->
<div class="d-block d-md-none">

@forelse($bookings as $booking)
    <div class="card mb-4 shadow-sm rounded-4 border-0">
        <div class="card-body">

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

            <div class="small text-muted">
                <div><strong>Hotel:</strong> {{ $booking->hotel->name }}</div>
                <div><strong>Room:</strong> {{ $booking->room->room_type }}</div>
                <div><strong>Check-In:</strong> {{ $booking->check_in_date }}</div>
                <div><strong>Check-Out:</strong> {{ $booking->check_out_date }}</div>
            </div>

            <hr>

            <!-- ACTION BUTTONS -->
            <div class="d-flex justify-content-between gap-2">

                <button class="btn btn-sm" data-bs-toggle="modal"
                        data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                    <img src="{{ asset('/images/previewicon.png') }}" alt="">
                </button>

                <button class="btn btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editBookingModal{{ $booking->booking_id }}">
                    <img src="{{ asset('/images/editicon.png') }}" alt="">
                </button>

                <button class="btn btn-sm" data-bs-toggle="modal"
                        data-bs-target="#deleteBookingModal{{ $booking->booking_id }}">
                    <img src="{{ asset('/images/deleteicon.png') }}" alt="">
                </button>

            </div>

        </div>
    </div>

@empty
    <div class="text-center text-muted">
        No bookings found
    </div>
@endforelse

</div>


<!-- SCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ADD MODAL
    let addHotelSelect = document.getElementById('hotelSelect');
    let addRoomSelect = document.getElementById('roomSelect');

    if (addHotelSelect) {
        addHotelSelect.addEventListener('change', function () {

            let hotelId = this.value;
            addRoomSelect.innerHTML = '<option>Loading...</option>';

            if (!hotelId) {
                addRoomSelect.innerHTML = '<option value="">Select Room</option>';
                return;
            }

            fetch(`/admin/rooms/by-hotel/${hotelId}`)
                .then(res => res.json())
                .then(data => {
                    addRoomSelect.innerHTML = '<option value="">Select Room</option>';

                    data.forEach(room => {
                        addRoomSelect.innerHTML += `<option value="${room.room_id}">${room.room_type}</option>`;
                    });
                })
                .catch(() => {
                    addRoomSelect.innerHTML = '<option value="">Error loading rooms</option>';
                });
        });
    }

    // EDIT MODALS
    document.querySelectorAll('[id^="hotelSelect"]').forEach(select => {

        // ❗ skip ADD modal
        if (select.id === 'hotelSelect') return;

        select.addEventListener('change', function () {

            let bookingId = this.id.replace('hotelSelect', '');
            let roomSelect = document.getElementById('roomSelect' + bookingId);
            let selectedRoom = roomSelect.getAttribute('data-selected');

            roomSelect.innerHTML = '<option>Loading...</option>';

            fetch(`/admin/rooms/by-hotel/${this.value}`)
                .then(res => res.json())
                .then(data => {
                    roomSelect.innerHTML = '<option value="">Select Room</option>';

                    data.forEach(room => {
                        let selected = room.room_id == selectedRoom ? 'selected' : '';
                        roomSelect.innerHTML += `<option value="${room.room_id}" ${selected}>${room.room_type}</option>`;
                    });
                });
        });
    });

    // trigger edit modal loading
    document.querySelectorAll('[id^="editBookingModal"]').forEach(modal => {
        modal.addEventListener('shown.bs.modal', function () {
            let hotelSelect = modal.querySelector('[id^="hotelSelect"]');
            if (hotelSelect) {
                hotelSelect.dispatchEvent(new Event('change'));
            }
        });
    });

});
</script>

@endsection