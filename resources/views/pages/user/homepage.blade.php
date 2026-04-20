@extends('layouts.user.content')

@section('title', 'Homepage')

@section('content')

<!--Include Homepage CSS File-->
<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <div class="col-12 mid-div d-flex flex-column align-items-center">
            <div class="col-10 mt-5 position-relative">
                <div class="img-cont d-flex justify-content-center">
                    <img src="{{ asset('/images/homepage-banner.png') }}" alt="outdoor hotel" class="img-fluid rounded">

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

                                            <div class="row">

                                                <div class="col-4">
                                                    <img src="{{ asset('/images/' . $hotel->image_path . '.png') }}" alt="Casa Chameleon" class="img-fluid rounded">
                                                </div>
                                                <div class="col-8">
                                                    <h2 class="card-title">{{ $hotel->name }}</h2>

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                                            </svg>
                                                            <text class="card-text">{{ $hotel->address->locality }}, {{ $hotel->address->country }}</text>
                                                        </div>
                                                        <div class="col-6">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                                            </svg>
                                                            <text class="card-text">{{ $hotel->min_capacity }}</text>
                                                            @if($hotel->max_capacity != null)
                                                                <text> - {{ $hotel->max_capacity }}</text>
                                                            @endif
                                                            <text>Guests</text>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            @for($i = 0; $i < $hotel->rating; $i++)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                                </svg>
                                                            @endfor
                                                            @for($i = 0; $i < (5 - $hotel->rating); $i++)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                                                </svg>
                                                            @endfor
                                                            <text class="card-text">{{ $hotel->rating }}/5</text>
                                                        </div>
                                                        <div class="col-6">
                                                            <text class="card-text">${{ $hotel->min_rate }}</text>
                                                            @if($hotel->max_rate != null)
                                                                <text> - ${{ $hotel->max_rate }}</text>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <p class="card-text">Features</p>

                                                    <a href="{{ url('hoteldetails', $hotel->hotel_id) }}" class="viewBtn py-2 px-4 text-decoration-none mt-3 float-end">View</a>
                                                </div>
                                                
                                            </div>

                                            
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