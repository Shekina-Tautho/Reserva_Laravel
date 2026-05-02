@extends('layouts.admin.navbar')

@section('title', 'Reserva Admin | Rooms')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<link rel="stylesheet" href="{{ asset('/css/admin.css') }}"/>

<!-- Topbar -->
<div class="topbar d-flex align-items-center justify-content-end">
    <div class="profile-initial">
        {{ strtoupper(substr(Auth::guard('employee')->user()->first_name, 0, 1)) }}
    </div>
    <span class="text-dark">{{ Auth::guard('employee')->user()->first_name }}</span>
</div>

<!-- Page Header -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start align-items-md-center gap-2 mb-4">
    <div>
        <h2 class="fw-bold mb-2">Rooms</h2>
    </div>

    <div class="mt-3 mt-md-4 d-flex gap-2 flex-wrap justify-content-md-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomModal">
            Add Room
        </button>
    </div>
</div>

<!-- Rooms Table -->
<div class="tb-rooms-container reserva-shadow rounded-4 overflow-hidden d-none d-md-block">
    <div class="table-responsive">
        <table class="table align-middle table-hover mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th class="ps-3">ID</th>
                    <th>Room Type</th>
                    <th>Hotel</th>
                    <th>Rate</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($rooms as $room)
                <tr>
                    <td>{{ $room->room_id }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td>{{ $room->hotel->name ?? 'N/A' }}</td>
                    <td> ${{ $room->room_rates }}</td>
                    
                    <td class="text-center">
                        <div class="action icons d-flex gap-2 justify-content-center flex-wrap">

                            <!-- PREVIEW -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#previewRoomModal{{ $room->room_id }}">
                                <img src="{{ asset('/images/previewicon.png') }}">
                            </button>

                            <!-- EDIT -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#editRoomModal{{ $room->room_id }}">
                                <img src="{{ asset('/images/editicon.png') }}">
                            </button>

                            <!-- DELETE -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#deleteRoomModal{{ $room->room_id }}">
                                <img src="{{ asset('/images/deleteicon.png') }}">
                            </button>

                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No rooms found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD ROOM MODAL -->
<div class="modal" id="addRoomModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('rooms.store') }}" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Add Room</h5></div>
            <div class="modal-body">

                <select name="hotel_id" class="form-control mb-2" required>
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotel_id }}">{{ $hotel->name }}</option>
                    @endforeach
                </select>

                <input type="text" name="room_type" class="form-control mb-2" placeholder="Room Type" required>
                <input type="text" name="capacity" class="form-control mb-2" placeholder="Capacity">

                <input type="text" name="no_of_beds" class="form-control mb-2" 
                    value="{{ old('no_of_beds', $room->no_of_beds ?? '') }}" required>

                <input type="text" name="amenities" class="form-control mb-2" placeholder="Amenities">
                <input type="number" step="0.10" name="room_rates" class="form-control mb-2" placeholder="Room Rate">

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- PREVIEW ROOM MODALS -->
@foreach($rooms as $room)
<div class="modal" id="previewRoomModal{{ $room->room_id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Room Preview</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Hotel:</strong> {{ $room->hotel->name ?? 'N/A' }}</p>
                <p><strong>Room Type:</strong> {{ $room->room_type }}</p>
                <p><strong>Capacity:</strong> {{ $room->capacity }}</p>
                <p><strong>No. of Beds:</strong> {{ $room->no_of_beds }}</p>
                <p><strong>Amenities:</strong> {{ $room->amenities }}</p>
                <p><strong>Rate:</strong> ${{ $room->room_rates }}</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- EDIT ROOM MODALS -->
@foreach($rooms as $room)
<div class="modal" id="editRoomModal{{ $room->room_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('rooms.update', $room->room_id) }}" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5>Edit Room</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <select name="hotel_id" class="form-control mb-2">
                    @foreach($hotels as $hotel)
                        <option value="{{ $hotel->hotel_id }}" 
                            {{ $room->hotel_id == $hotel->hotel_id ? 'selected' : '' }}>
                            {{ $hotel->name }}
                        </option>
                    @endforeach
                </select>

                <input type="text" name="room_type" class="form-control mb-2" value="{{ $room->room_type }}">
                <input type="text" name="capacity" class="form-control mb-2" value="{{ $room->capacity }}">
                <input type="text" name="no_of_beds" class="form-control mb-2" value="{{ $room->no_of_beds }}">
                <input type="text" name="amenities" class="form-control mb-2" value="{{ $room->amenities }}">
                <input type="number" step="0.10" name="room_rates" class="form-control mb-2" value="{{ $room->room_rates }}">

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
</div>
@endforeach

<!-- DELETE ROOM MODALS -->
@foreach($rooms as $room)
<div class="modal" id="deleteRoomModal{{ $room->room_id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirm Delete</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Delete room <strong>#{{ $room->room_id }}</strong>?
            </div>

            <div class="modal-footer">
                <form action="{{ route('rooms.delete', $room->room_id) }}" method="POST">
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

<!-- MOBILE ROOMS CARD VIEW -->
<div class="d-block d-md-none">

@forelse($rooms as $room)
    <div class="card mb-4 shadow-sm border-0 rounded-4">
        <div class="card-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <h6 class="mb-1 fw-bold">
                        #{{ $room->room_id }}
                    </h6>
                    <small class="text-muted">
                        {{ $room->room_type }}
                    </small>
                </div>

                <span class="badge bg-dark">
                    ${{ $room->room_rates }}
                </span>
            </div>

            <!-- Details -->
            <div class="small text-muted">

                <div class="mb-1">
                    <strong>Hotel:</strong>
                    {{ $room->hotel->name ?? 'N/A' }}
                </div>

                <div class="mb-1">
                    <strong>Capacity:</strong>
                    {{ $room->capacity }}
                </div>

                <div class="mb-1">
                    <strong>Beds:</strong>
                    {{ $room->no_of_beds }}
                </div>

                <div>
                    <strong>Amenities:</strong><br>
                    {{ $room->amenities }}
                </div>

            </div>

            <hr>

            <!-- Actions -->
            <div class="d-flex justify-content-between gap-2">

                <!-- PREVIEW -->
                <button class="btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#previewRoomModal{{ $room->room_id }}">
                    <img src="{{ asset('/images/previewicon.png') }}" alt="">
                </button>

                <!-- EDIT -->
                <button class="btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editRoomModal{{ $room->room_id }}">
                    <img src="{{ asset('/images/editicon.png') }}" alt="">
                </button>

                <!-- DELETE -->
                <button class="btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteRoomModal{{ $room->room_id }}">
                    <img src="{{ asset('/images/deleteicon.png') }}" alt="">
                </button>

            </div>

        </div>
    </div>

@empty
    <div class="text-center text-muted">
        No rooms found
    </div>
@endforelse

</div>

@endsection