@extends('layouts.user.content')

@section('title', 'User Account')

@section('content')

<!--Include User Account CSS File-->
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}"/>

<div class="container-fluid main-div">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <div class="col-10 mt-5 name-container px-5 d-flex align-items-center">
            <span class="w-60" style="font-size: 2rem; color: gray; font-weight: bold;">{{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</span>
            <p class="JaneDoe px-3 pt-3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        </div>

        <div class="info d-flex flex-column align-items-center">
            <p class="boldText large mt-5">MY BOOKINGS</p>

            <div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Hotel</th>
                            <th scope="col">Room</th>
                            <th scope="col">Check-In</th>
                            <th scope="col">Check-Out</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr>
                            <th scope="row">{{ $booking->booking_id }}</th>
                            <td>{{ $booking->hotel->name }}</td>
                            <td>{{ $booking->room->room_type }}</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td>{{ $booking->status }}</td>
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
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        </div>



        


    </div>
</div>

@endsection