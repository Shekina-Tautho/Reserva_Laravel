@extends('layouts.user.content')

@section('title', $hotels->name)

@section('content')

<!--Include Bookings CSS File-->
<link rel="stylesheet" href="{{ asset('/css/booking.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>
    <div class="col-12 d-flex align-items-center flex-column">
        <div class="col-10 mt-3">
            <div class="base-container p-5 mb-5">
                <img src="{{ asset('/images/' . $hotels->image_path . '.png') }}" alt="{{ $hotels->name }}" class="img-fluid align-self-center mb-5">
                <p class="bold blue xl pt-2 hotelName mb-0">{{ $hotels->name }}</p>
                <div class="d-flex mt-2 align-items-center">
                    <i class="bi bi-geo-alt p-0 gray me-1"></i>
                    <span class="hotel-info">{{ $hotels->address }}</span>
                </div>
                <div class="overview py-3 mt-3">
                    <p class="bold large mb-0">Overview</p>
                    <span class="description">{{ $hotels->overview }}</span>
                </div>
                <div class="overview py-2">
                    <p class="bold large mb-1">Rooms</p>
                    @foreach ($rooms as $room)
                        <div class="card mb-2">
                            <div class="row"> 
                                <div class="col-4"> 
                                    <img src="" class="card-img-" alt="...">
                                </div>
                                <div class="col-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $room->room_type }}</h5>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text">{{ $room->capacity }}</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-text">{{ $room->no_of_beds }}</p>
                                            </div>
                                        </div>
                                        <p class="card-text">{{ $room->amenities }}</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text">{{ $room->room_rates }} per night</p>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-primary" href="{{ url('paymentdetails', $room->room_id) }}" role="button">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection