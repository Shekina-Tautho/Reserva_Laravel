@extends('layouts.admin.navbar')

@section('title', 'Reserva Admin | Bookings')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<link rel="stylesheet" href="{{ asset('css/admin.css') }}"/>

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

                        <!-- PREVIEW -->
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                            <img src="{{ asset('/images/previewicon.png') }}" alt="">
                        </button>

                        <!-- EDIT -->
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#editBookingModal{{ $booking->booking_id }}">
                            <img src="{{ asset('/images/editicon.png') }}" alt="">
                        </button>

                        <!-- DELETE -->
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#deleteBookingModal{{ $booking->booking_id }}">
                            <img src="{{ asset('/images/deleteicon.png') }}" alt="">
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

                <select name="hotel_id" id="hotelSelect" class="form-control mb-2" required>
                    <option value="">Select Hotel</option>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotel_id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>

                <select name="room_id" id="roomSelect" class="form-control mb-2" required>
                    <option value="">Select Room</option>
                </select>

                <select name="employee_id" class="form-control mb-2" required>
                    <option value="">Assign Employee</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                    @endforeach
                </select>

                <!-- other fields -->
                <input type="date" name="check_in_date" class="form-control mb-2" 
                    value="{{ $booking->check_in_date }}" 
                    min="{{ date('Y-m-d') }}" required>

                <input type="date" name="check_out_date" class="form-control mb-2" 
                    value="{{ $booking->check_out_date }}" 
                    min="{{ date('Y-m-d') }}" required>

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

<!-- PREVIEW BOOKING MODALS -->
@foreach($bookings as $booking)
<div class="modal fade" id="previewBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Booking Preview</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Left column: Booking details -->
                    <div class="col-md-6">
                        <p><strong>Guest:</strong> {{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                        <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                        <p><strong>Phone No.:</strong> {{ $booking->user->phone_no }}</p>
                        <p><strong>Hotel:</strong> {{ $booking->hotel->name }}</p>
                        <p><strong>Room:</strong> {{ $booking->room->room_type }}</p>
                        <p><strong>Employee in Charge:</strong> {{ $booking->employee->first_name }} {{ $booking->employee->last_name }}</p>
                        <p><strong>Check-In:</strong> {{ $booking->check_in_date }}</p>
                        <p><strong>Check-Out:</strong> {{ $booking->check_out_date }}</p>
                        <p><strong>Status:</strong> 
                            <span class="badge {{ $booking->status == 'Confirmed' ? 'bg-success' : ($booking->status == 'Cancelled' ? 'bg-danger' : 'bg-warning') }}">
                                {{ $booking->status }}
                            </span>
                        </p>
                    </div>

                    <!-- Right column: Proof image -->
                    <div class="col-md-6 text-center">
                        @if($booking->proof_image_path)
                            <img src="{{ asset('storage/' . $booking->proof_image_path) }}" alt="Proof Image" class="img-fluid rounded shadow">
                        @else
                            <p class="text-muted">No proof image uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- EDIT BOOKING MODALS -->
@foreach($bookings as $booking)
<div class="modal fade" id="editBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('bookings.update', $booking->booking_id) }}" enctype="multipart/form-data" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5>Edit Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <select name="user_id" class="form-control mb-2" required>
                    @foreach($users as $user)
                        <option value="{{ $user->user_id }}" {{ $booking->user_id == $user->user_id ? 'selected' : '' }}>
                            {{ $user->first_name }} {{ $user->last_name }}
                        </option>
                    @endforeach
                </select>
                
                <select name="hotel_id" id="hotelSelect{{ $booking->booking_id }}" class="form-control mb-2">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotel_id }}" {{ $booking->hotel_id == $hotel->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>

                <select name="room_id" id="roomSelect{{ $booking->booking_id }}" class="form-control mb-2">
                    <option value="">Select Room</option>
                </select>

                <select name="employee_id" class="form-control mb-2" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->employee_id }}" {{ $booking->employee_id == $employee->employee_id ? 'selected' : '' }}>
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </option>
                    @endforeach
                </select>

                <!-- other fields -->
                <input type="date" name="check_in_date" class="form-control mb-2" 
                    value="{{ $booking->check_in_date }}" 
                    min="{{ date('Y-m-d') }}" required>

                <input type="date" name="check_out_date" class="form-control mb-2" 
                    value="{{ $booking->check_out_date }}" 
                    min="{{ date('Y-m-d') }}" required>

                <input type="file" name="proof_image" class="form-control mb-2" accept="image/*">

                <select name="status" class="form-control mb-2">
                    <option {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>

                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- DELETE CONFIRMATION MODALS -->
@foreach($bookings as $booking)
<div class="modal fade" id="deleteBookingModal{{ $booking->booking_id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete booking <strong>#{{ $booking->booking_id }}</strong>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('bookings.delete', $booking->booking_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endforeach

<script>
document.querySelectorAll('[id^="hotelSelect"]').forEach(hotelSelect => {
    hotelSelect.addEventListener('change', function() {
        let hotelId = this.value;
        let bookingId = this.id.replace('hotelSelect', '');
        let roomSelect = document.getElementById('roomSelect' + bookingId);

        roomSelect.innerHTML = '<option value="">Loading...</option>';

        if (hotelId) {
            fetch(`/admin/rooms/by-hotel/${hotelId}`)
                .then(response => response.json())
                .then(data => {
                    roomSelect.innerHTML = '<option value="">Select Room</option>';
                    data.forEach(room => {
                        roomSelect.innerHTML += `<option value="${room.room_id}">${room.room_type}</option>`;
                    });
                })
                .catch(error => {
                    console.error(error);
                    roomSelect.innerHTML = '<option value="">Error loading rooms</option>';
                });
        } else {
            roomSelect.innerHTML = '<option value="">Select Room</option>';
        }
    });
});

document.querySelectorAll('[id^="editBookingModal"]').forEach(modal => {
    modal.addEventListener('shown.bs.modal', function() {
        let hotelSelect = modal.querySelector('[id^="hotelSelect"]');
        hotelSelect.dispatchEvent(new Event('change'));
    });
});

</script>

@endsection
