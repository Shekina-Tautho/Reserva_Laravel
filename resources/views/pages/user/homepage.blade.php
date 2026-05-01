@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'Homepage')

@section('content')

<!--Include Homepage CSS File-->
<link rel="stylesheet" href="{{ asset('/css/homepage.css') }}"/>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 d-flex flex-column mid-div align-items-center">
            <div class="col-10 mt-5 position-relative">
                <div class="img-cont d-flex justify-content-center">
                    <img src="{{ asset('/images/homepage-banner.png') }}" alt="outdoor hotel" class="img-fluid rounded">
                    <form action="{{ route('UserHotelSearchRoute') }}" method="GET" class="container shadow-lg rounded-4 bg-white p-lg-4 p-2 position-absolute top-100 start-50 translate-middle">
                        <div class="input-group">
                            <input type="text" class="form-control border-0" placeholder="Search" name="search" value="{{ request()->get('search') }}" style="box-shadow: none; outline: none;">
                            <button type="submit" class="btn">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center justify-content-center flex-column py-5">
                    <p class="xl blue bold mt-lg-5">CC's Picks</p>
                    <span class="d-flex flex-column align-items-center mt-0">
                        Carefully selected stays with exclusive perks,
                        chosen just for you by CC Vacations.
                    </span>

                    <div class="col-12 cards-container d-flex flex-column align-items-center py-5">
                        @if (DB::table('hotel')->where('is_recommended', 1)->exists())
                            @foreach ($hotels as $hotel)
                                @if($hotel->is_recommended)
                                    <div class="card col-12 border-0 shadow mb-4">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-4">
                                                    <img src="{{ asset('/images/' . $hotel->image_path . '.png') }}" alt="{{ $hotel->name }}" class="img-fluid rounded">
                                                </div>
                                                <div class="col-8">
                                                    <h4 class="card-title bold mb-2" style="color: #0057AB">{{ $hotel->name }}</h4>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <i class="bi bi-geo-alt-fill" style="color: #0057AB"></i>
                                                            <text class="card-text">{{ $hotel->address->locality }}, {{ $hotel->address->country }}</text>
                                                        </div>
                                                        <div class="col-lg-6 col-12 d-flex justify-content-lg-end gap-1">
                                                            <i class="bi bi-person-fill" style="color: #0057AB"></i>
                                                            <text class="card-text">{{ $hotel->min_capacity }}</text>
                                                            @if($hotel->max_capacity != null)
                                                                <text> - {{ $hotel->max_capacity }}</text>
                                                            @endif
                                                            <text>Guests</text>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            @for($i = 0; $i < $hotel->rating; $i++)
                                                                <i class="bi bi-star-fill" style="color: #0057AB"></i>
                                                            @endfor
                                                            @for($i = 0; $i < (5 - $hotel->rating); $i++)
                                                                <i class="bi bi-star" style="color: #6c757d"></i>
                                                            @endfor
                                                            <text class="card-text">{{ $hotel->rating }}/5</text>
                                                        </div>
                                                        <div class="col-lg-6 col-12 d-flex justify-content-lg-end gap-1">
                                                            <text class="card-text bold" style="color: #0057AB">${{ number_format($hotel->min_rate, 2) }}</text>
                                                            @if($hotel->max_rate != null)
                                                                <text class="card-text bold" style="color: #0057AB"> - ${{ number_format($hotel->max_rate, 2) }}</text>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <text class="card-text text-muted mb-1">Features</text>
                                                    </div>
                                                    <!--BUTTON TAG CLOUDS-->
                                                    @if(str_contains($hotel->features, 'Free Breakfast'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm mb-1" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fork-knife" viewBox="0 0 16 16">
                                                                <path d="M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z"/>
                                                            </svg>
                                                            Free Breakfast
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Free WiFi'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm mb-1" disabled>
                                                            <i class="bi bi-wifi"></i>
                                                            Free WiFi
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Parking Space'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm mb-1" disabled>
                                                            <i class="bi bi-car-front-fill"></i>
                                                            Parking Space
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Private Balcony'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm mb-1" disabled>
                                                            <i class="bi bi-brightness-alt-high-fill"></i>
                                                            Private Balcony
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Restaurant'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm mb-1" disabled>
                                                            <i class="bi bi-shop-window"></i>
                                                            Restaurant
                                                        </button>
                                                    @endif
                                                    @if(str_contains($hotel->features, 'Swimming Pool'))
                                                        <button type="button" class="btn btn-outline-secondary btn-sm mb-1" disabled>
                                                            <i class="bi bi-water"></i>
                                                            Swimming Pool
                                                        </button>
                                                    @endif
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