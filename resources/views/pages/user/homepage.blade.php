@extends('layouts.user.content')

@section('title', 'Homepage')

@section('content')

<!--Include Homepage CSS File-->
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <div class="col-12 mid-div d-flex flex-column align-items-center">
            <div class="col-10 mt-5 position-relative">
                <div class="img-cont d-flex justify-content-center">
                    <img src="{{ asset('images/homepage.png') }}" alt="outdoor hotel" class="img-fluid rounded">

                    <form id="searchForm" action="hotels.php" method="GET" class="search-box container shadow-lg rounded-4 bg-white p-4 position-absolute top-100 start-50 translate-middle">
                        <div class="row text-center">
                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end">
                                <h6 class="fw-semibold mb-1">Location</h6>
                                <input type="text" name="location" class="form-control-plaintext search-input" placeholder="Where are you going?" required>
                            </div>
                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end">
                                <h6 class="fw-semibold mb-1">Check In</h6>
                                <input type="date" name="checkin" class="form-control-plaintext search-input" required>
                            </div>
                            <div class="col-md-3 col-6 mb-3 mb-md-0 border-end">
                                <h6 class="fw-semibold mb-1">Check Out</h6>
                                <input type="date" name="checkout" class="form-control-plaintext search-input" required>
                            </div>
                            <div class="col-md-3 col-6">
                                <h6 class="fw-semibold mb-1">Guests</h6>
                                <input type="number" name="guests" class="form-control-plaintext search-input" placeholder="Add guests" min="1" required>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center justify-content-center flex-column py-5 mt-5">
                    <p class="xl blue bold mt-5">CC's Picks</p>
                    <span class="d-flex flex-column align-items-center mt-0">
                        Carefully selected stays with exclusive perks,
                        chosen just for you by CC Vacations.
                    </span>

                    <div class="col-12 cards-container d-flex flex-column align-items-center py-5">
                        @if (DB::table('hotel')->where('is_recommended', 1)->exists())
                            @foreach ($hotels as $hotel)
                                @if($hotel->is_recommended)
                                    <div class="card col-12 mb-3">
                                        <div class="card-body">
                                            <h2 class="card-title">{{$hotel->name}}</h2>
                                            <p class="card-text">{{$hotel->overview}}</p>
                                            <p class="card-text">{{$hotel->address}}</p>
                                            <a href="#" class="viewBtn py-2 px-4 text-decoration-none mt-3 float-end">View</a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @else
                            <p>No CC's Picks available at the moment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection