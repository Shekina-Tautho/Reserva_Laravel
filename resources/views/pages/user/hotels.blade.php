@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'Hotels')

@section('content')

<!--Include Hotel Search CSS File-->
<link rel="stylesheet" href="{{ asset('/css/hotels.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <!-- Header Image + Search Box -->
        <div class="container-fluid image-container">
            <div class="row justify-content-center">
                <div class="col-12 d-flex align-items-center justify-content-center px-0">
                    <img src="{{ asset('/images/search-banner.png') }}" alt="Tourist Spot" class="img-fluid w-100 hotelsPic">

                    <div class="col-9 mid-div position-absolute d-flex">
                        <div class="container white-box p-lg-4">
                            <div class="row">
                                <form action="{{ route('UserHotelSearchRoute') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control border-0" placeholder="Search" name="search" value="{{ request()->get('search') }}" style="box-shadow: none; outline: none;">
                                        <button type="submit" class="btn">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!--SIDEBAR-->
        <div class="col-4">
            <div class="container p-lg-5 p-2">
                <div class="filterText rounded-4 shadow p-lg-4 p-2" style="height:auto;">
                    <p class="sortText boldText">Filter by:</p>

                    <form action="{{ route('UserHotelFilterRoute') }}" method="GET">
                        <p>Rate: </p>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text filterText" id="basic-addon1">$</span>
                            <input type="number" class="form-control form-control-sm filterText" placeholder="Minimum" name="min_rate" step="100" min="0">
                            <span class="input-group-text filterText border-0 bg-white">-</span>
                            <span class="input-group-text filterText" id="basic-addon1">$</span>
                            <input type="number" class="form-control form-control-sm filterText" placeholder="Maximum" name="max_rate" step="100" min="0">
                        </div>
                        <p class="mt-4">Popular Filters</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="free_breakfast" id="free_breakfast" name="free_breakfast">
                            <label class="form-check-label" for="free_breakfast">Free Breakfast</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="free_wifi" id="free_wifi" name="free_wifi">
                            <label class="form-check-label" for="free_wifi">Free WiFi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="parking_space" id="parking_space" name="parking_space">
                            <label class="form-check-label" for="parking_space">Parking Space</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="private_balcony" id="private_balcony" name="private_balcony">
                            <label class="form-check-label" for="private_balcony">Private Balcony</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="restaurant" id="restaurant" name="restaurant">
                            <label class="form-check-label" for="restaurant">Restaurant</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="swimming_pool" id="swimming_pool" name="swimming_pool">
                            <label class="form-check-label" for="swimming_pool">Swimming Pool</label>
                        </div>
                        <div class="mt-4 d-flex justify-content-end">
                            <button type="submit" class="applyBtn py-2 w-50">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--RESULTS-->
        <div class="col-8">
            <div class="container py-lg-5 py-2">
                <p class="blueText boldText resultText pt-3">
                    Results: <span class="result"></span>
                </p>
                <!-- Sorting -->
                <div class="d-flex gap-2 mb-3">
                    
                    <p class="sortText boldText mt-1">Sort by:</p>
                    <form action="{{ route('UserHotelSortRoute') }}" method="GET">
                        <div class="input-group">
                            <select id="sort_by" name="sort_by" class="form-select w-auto">
                                <option value="no_category">Select a Category</option>
                                <option value="name_asc">Name: A to Z</option>
                                <option value="name_desc">Name: Z to A</option>
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                                <option value="rating_asc">Rating: Low to High</option>
                                <option value="rating_desc">Rating: High to Low</option>
                            </select>
                            <button type="submit" class="btn btn-primary" style="background-color: #0057AB; border-color: #0057AB">Sort</button>
                        </div>
                    </form>
                </div>

                <!-- Hotels -->
                <div class="hotels-section py-4">
                    @if ($hotels->count() > 0)
                        @foreach ($hotels as $hotel)
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
                                                    <text class="card-text bold" style="color: #0057AB; font-weight: bold">${{ number_format($hotel->min_rate, 2) }}</text>
                                                    @if($hotel->max_rate != null)
                                                        <text class="card-text bold" style="color: #0057AB; font-weight: bold"> - ${{ number_format($hotel->max_rate, 2) }}</text>
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
                            
                        @endforeach
                    @else
                        <p class='text-muted'>No hotels found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection