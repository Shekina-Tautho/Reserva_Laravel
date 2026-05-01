@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'User Bookings')

@section('content')

<!--Include User Account CSS File-->
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}"/>

<div class="container-fluid main-div">
    <div class="row d-flex justify-content-center">
        

        <div class="col-10 mt-5 name-container px-5 d-flex align-items-center">
            <!--<span class="w-60" style="font-size: 2rem; color: white; font-weight: bold;">{{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</span>-->
            <div class="profile-circle d-flex justify-content-center align-items-center rounded-circle me-2" style="width: 50px; height: 50px; background-color: #969696;">
                <span class="w-60" style="font-size: 2rem; color: white; font-weight: bold;">{{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</span>
            </div>
            <p class="JaneDoe px-3 pt-3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        </div>

        <div class="col-10 info d-flex flex-column align-items-center">
            <p class="boldText large mt-5">MY BOOKINGS</p>

            <!--BOOKING CARDS-->
            <div class="container mt-4">
                <div class="row">
                    @foreach($bookings as $booking)
                        @if($booking->proof_image_path == null)
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="card border-danger shadow border-3 h-100" style="border-bottom: 0px; border-left: 0px; border-right: 0px;">
                                    <div class="card-header bg-transparent fw-bold">Booking ID #{{ $booking->booking_id }}</div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Status</p>
                                        <p class="card-text">{{ $booking->status }}</p>
                                        <p class="card-text fw-bold">Hotel</p>
                                        <p class="card-text">{{ $booking->hotel->name }}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-In Date</p>
                                                <p class="card-text">{{ $booking->check_in_date }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-Out Date</p>
                                                <p class="card-text">{{ $booking->check_out_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <button class="btn btn-danger float-end" data-bs-toggle="modal" data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @elseif($booking->proof_image_path != null && $booking->status == 'Pending')
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="card border-warning shadow border-3 h-100" style="border-bottom: 0px; border-left: 0px; border-right: 0px;">
                                    <div class="card-header bg-transparent fw-bold">Booking ID #{{ $booking->booking_id }}</div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Status</p>
                                        <p class="card-text">{{ $booking->status }}</p>
                                        <p class="card-text fw-bold">Hotel</p>
                                        <p class="card-text">{{ $booking->hotel->name }}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-In Date</p>
                                                <p class="card-text">{{ $booking->check_in_date }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-Out Date</p>
                                                <p class="card-text">{{ $booking->check_out_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <button class="btn btn-warning float-end" data-bs-toggle="modal" data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @elseif($booking->proof_image_path != null && $booking->status == 'Verified')
                            <div class="col-lg-4 col-12 mb-4">
                                <div class="card border-success shadow border-3 h-100" style="border-bottom: 0px; border-left: 0px; border-right: 0px;">
                                    <div class="card-header bg-transparent fw-bold">Booking ID #{{ $booking->booking_id }}</div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Status</p>
                                        <p class="card-text">{{ $booking->status }}</p>
                                        <p class="card-text fw-bold">Hotel</p>
                                        <p class="card-text">{{ $booking->hotel->name }}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-In Date</p>
                                                <p class="card-text">{{ $booking->check_in_date }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-Out Date</p>
                                                <p class="card-text">{{ $booking->check_out_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @elseif($booking->proof_image_path != null && $booking->status == 'Rejected')
                                <div class="col-lg-4 col-12 mb-4">
                                <div class="card border-secondary shadow border-3 h-100" style="border-bottom: 0px; border-left: 0px; border-right: 0px;">
                                    <div class="card-header bg-transparent fw-bold">Booking ID #{{ $booking->booking_id }}</div>
                                    <div class="card-body">
                                        <p class="card-text fw-bold">Status</p>
                                        <p class="card-text">{{ $booking->status }}</p>
                                        <p class="card-text fw-bold">Hotel</p>
                                        <p class="card-text">{{ $booking->hotel->name }}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-In Date</p>
                                                <p class="card-text">{{ $booking->check_in_date }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-text fw-bold">Check-Out Date</p>
                                                <p class="card-text">{{ $booking->check_out_date }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent">
                                        <button class="btn btn-secondary float-end" data-bs-toggle="modal" data-bs-target="#previewBookingModal{{ $booking->booking_id }}">
                                            View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

<!--MODAL-->
@foreach($bookings as $booking)
<div class="modal fade" id="previewBookingModal{{ $booking->booking_id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header fw-bold">Booking Details</div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-6">
                        <p class="fw-bold">Booking ID</p>
                        <p>#{{ $booking->booking_id }}</p>
                    </div>
                    <div class="col-6">
                        <p class="fw-bold">Status</p>
                        <p>{{ $booking->status }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="fw-bold">Hotel</p>
                        <p>{{ $booking->hotel->name }}</p>
                    </div>

                    <div class="col-6">
                        <p class="fw-bold">Room</p>
                        <p>{{ $booking->room->room_type }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p class="fw-bold">Check-In Date</p>
                        <p>{{ $booking->check_in_date }}</p>
                    </div>
                    <div class="col-6">
                        <p class="fw-bold">Check-Out Date</p>
                        <p>{{ $booking->check_out_date }}</p>
                    </div>
                </div>

                <div class="row">
                        <p class="fw-bold">Reserved Under</p>
                        <p>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</p>
                </div>

                <div class="row">
                    <p class="fw-bold">Proof of Payment</p>
                    @if($booking->proof_image_path)
                        <img src="{{ asset('storage/' . $booking->proof_image_path) }}" alt="Proof of Payment" class="img-fluid">
                    @else
                        @if($booking->status == 'Verified' || $booking->status == 'Rejected')
                            <form action="{{ route('UserReservationsStoreRoute') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="file" name="proof_image" class="form-control mb-2" accept="image/*" disabled>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary mb-2" disabled>Upload</button>
                                    </div>
                                </div>
                                <!--HIDDEN-->
                                <input type="hidden" name="booking_id" value="{{ $booking->booking_id }}">
                            </form>
                        @else
                            <form action="{{ route('UserReservationsStoreRoute') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group">
                                    <input type="file" name="proof_image" class="form-control mb-2" accept="image/*" required>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary mb-2">Upload</button>
                                    </div>
                                </div>
                                <!--HIDDEN-->
                                <input type="hidden" name="booking_id" value="{{ $booking->booking_id }}">
                            </form>
                        @endif
                    @endif
                </div>



            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection