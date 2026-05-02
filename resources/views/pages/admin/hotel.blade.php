@extends('layouts.admin.navbar')

@section('title', 'Reserva Admin | Hotels')

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
        <h2 class="fw-bold mb-2">Hotels</h2>
    </div>

    <div class="mt-3 mt-md-4 d-flex gap-2 flex-wrap justify-content-md-end">
        <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addHotelModal">
            <img src="" alt=""> Add Hotel
        </button>
    </div>
</div>

<!-- Hotels Table -->
<div class="tb-hotels-container reserva-shadow rounded-4 overflow-hidden d-none d-md-block">
    <div class="table-responsive">
        <table class="table align-middle table-hover mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="ps-3">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Post Code</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody>
                @forelse($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->hotel_id }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->address->thoroughfare }}, {{ $hotel->address->locality }}, {{ $hotel->address->administrative_area }}, {{ $hotel->address->country }}</td>
                    <td>{{ $hotel->address->postal_code }}</td>

                    <td class="text-center">
                        <div class="action-icons d-flex gap-2 justify-content-center flex-wrap">

                            <!-- PREVIEW -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#previewHotelModal{{ $hotel->hotel_id }}">
                                <img src="{{ asset('/images/previewicon.png') }}">
                            </button>

                            <!-- EDIT -->
                            <button class="btn p-2" data-bs-toggle="modal" data-bs-target="#editHotelModal{{ $hotel->hotel_id }}">
                                <img src="{{ asset('/images/editicon.png') }}">
                            </button>

                            <!-- DELETE -->
                            <button type="button p-2" class="btn" data-bs-toggle="modal" data-bs-target="#deleteHotelModal{{ $hotel->hotel_id }}">
                                <img src="{{ asset('/images/deleteicon.png') }}">
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No hotels found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD HOTEL MODAL -->
<div class="modal" id="addHotelModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('hotels.store') }}" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Add Hotel</h5></div>
            <div class="modal-body">
                <input type="text" name="name" class="form-control mb-2" placeholder="Hotel Name" required>
                <textarea name="overview" class="form-control mb-2" placeholder="Hotel Overview"></textarea>
                <input type="text" name="address" class="form-control mb-2" placeholder="Address" required>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- PREVIEW HOTEL MODALS -->
@foreach($hotels as $hotel)
<div class="modal" id="previewHotelModal{{ $hotel->hotel_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Hotel Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Name:</strong> {{ $hotel->name }}</p>
                <p><strong>Address:</strong> {{ $hotel->address->thoroughfare }}, {{ $hotel->address->locality }}, {{ $hotel->address->administrative_area }}, {{ $hotel->address->country }}</p>
                <p><strong>Postal Code:</strong> {{ $hotel->address->postal_code }}</p>
                <p><strong>Overview:</strong> {{ $hotel->overview }}</p>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- EDIT HOTEL MODALS -->
@foreach($hotels as $hotel)
<div class="modal" id="editHotelModal{{ $hotel->hotel_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('hotels.update', $hotel->hotel_id) }}" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5>Edit Hotel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" name="name" class="form-control mb-2" value="{{ $hotel->name }}" required>
                <textarea name="overview" class="form-control mb-2">{{ $hotel->overview }}</textarea>
                <input type="text" name="address" class="form-control mb-2" value="{{ $hotel->address->thoroughfare }}, {{ $hotel->address->locality }}, {{ $hotel->address->administrative_area }}, {{ $hotel->address->country }} {{ $hotel->address->postal_code }}" required>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<!-- DELETE CONFIRMATION MODALS -->
@foreach($hotels as $hotel)
<div class="modal" id="deleteHotelModal{{ $hotel->hotel_id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete hotel <strong>#{{ $hotel->hotel_id }}</strong>?
            </div>
            <div class="modal-footer">
                <form action="{{ route('hotels.delete', $hotel->hotel_id) }}" method="POST">
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

<!-- MOBILE HOTEL CARDS -->
<div class="d-block d-md-none">

@forelse($hotels as $hotel)
    <div class="card mb-4 shadow-sm border-0 rounded-4">
        <div class="card-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <h6 class="mb-1 fw-bold">
                        #{{ $hotel->hotel_id }}
                    </h6>
                    <small class="text-muted">
                        {{ $hotel->name }}
                    </small>
                </div>
            </div>

            <!-- Content -->
            <div class="small text-muted">
                <div class="mb-1">
                    <strong>Address:</strong><br>
                    {{ $hotel->address->thoroughfare }},
                    {{ $hotel->address->locality }},
                    {{ $hotel->address->administrative_area }},
                    {{ $hotel->address->country }}
                </div>

                <div>
                    <strong>Post Code:</strong>
                    {{ $hotel->address->postal_code }}
                </div>
            </div>

            <hr>

            <!-- Actions -->
            <div class="d-flex justify-content-between gap-2">

                <!-- PREVIEW -->
                <button class="btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#previewHotelModal{{ $hotel->hotel_id }}">
                    <img src="{{ asset('/images/previewicon.png') }}" alt="">
                </button>

                <!-- EDIT -->
                <button class="btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editHotelModal{{ $hotel->hotel_id }}">
                    <img src="{{ asset('/images/editicon.png') }}" alt="">
                </button>

                <!-- DELETE -->
                <button class="btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteHotelModal{{ $hotel->hotel_id }}">
                    <img src="{{ asset('/images/deleteicon.png') }}" alt="">
                </button>

            </div>

        </div>
    </div>

@empty
    <div class="text-center text-muted">
        No hotels found
    </div>
@endforelse

</div>

@endsection
