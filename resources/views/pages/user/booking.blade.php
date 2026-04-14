@extends('layouts.user.content')

@section('title', 'Booking')

@section('content')

<!--Include Booking CSS File-->
<link rel="stylesheet" href="{{ asset('css/booking.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>
        <div class="col-12 d-flex align-items-center flex-column">
            <div class="col-10 mt-3">
                <div class="base-container p-5 mb-5">
                    <img src="{{ asset('images/payment verification hotel.jpg') }}" alt="hotel room" class="img-fluid align-self-center mb-5">
                    <p class="bold blue xl pt-2 hotelName mb-0">Hotel A</p>
                    <div class="d-flex mt-2 align-items-center">
                        <i class="bi bi-geo-alt p-0 gray me-1"></i>
                        <span class="hotel-info">Manila, Luzon</span>
                    </div>
                    <div class="overview py-3 mt-3">
                        <p class="bold large mb-0">Overview</p>
                        <span class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute 
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
                            nulla pariatur.
                        </span>
                    </div>
                    <div class="overview py-2">
                        <p class="bold large mb-0">Features</p>
                        <span class="description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute 
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat 
                            nulla pariatur.
                        </span>
                    </div>
                    <div class="overview py-2">
                        <p class="bold large mb-0">Details:</p>
                        <p class="bold mb-0">Accommodation Type: <span class="accommodation unbold">Double room</span></p>
                        <p class="bold mb-0">Number of Beds: <span class="accommodation unbold">1 King-sized Bed</span></p>
                        <p class="bold mb-0">Number of Guests: <span class="accommodation unbold">2</span></p>
                        <p class="bold mb-0">Price per Night: <span class="accommodation unbold">Php 10,000.00</span></p>
                    </div>
                    <div class="button-container d-flex justify-content-end">
                        <button class="bold book">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection