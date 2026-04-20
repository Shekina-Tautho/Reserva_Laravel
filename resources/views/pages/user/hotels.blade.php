@extends('layouts.user.content')

@section('title', 'Hotels')

@section('content')

<!--Include Hotel Search CSS File-->
<link rel="stylesheet" href="{{ asset('/css/hotels.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <!-- Navbar -->
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <!-- Header Image + Search Box -->
        <div class="container-fluid image-container">
            <div class="row justify-content-center">
                <div class="col-12 px-0">
                    <img src="{{ asset('/images/search-banner.png') }}" alt="Tourist Spot" class="img-fluid w-100 hotelsPic">
                </div>

                <div class="col-9">
                    <div class="white-box text-center p-4 container">
                        <div class="row">
                            <!-- Location -->
                            <div class="col-3 border-right d-flex align-items-center">
                                <i class="bi bi-geo-alt me-2"></i>
                                <input type="text" id="locationInput" class="search-input w-100" placeholder="Manila, Luzon">
                            </div>
                            <!-- Check-in -->
                            <div class="col-3 border-right d-flex align-items-center">
                                <i class="bi bi-calendar-week me-2"></i>
                                <input type="date" id="checkInInput" class="search-input w-100">
                            </div>
                            <!-- Check-out -->
                            <div class="col-3 border-right d-flex align-items-center">
                                <i class="bi bi-calendar-week me-2"></i>
                                <input type="date" id="checkOutInput" class="search-input w-100">
                            </div>
                            <!-- Guests/Rooms -->
                            <div class="col-3 d-flex align-items-center">
                                <i class="bi bi-people-fill me-2"></i>
                                <input type="text" id="guestsRoomsInput" class="search-input w-100" placeholder="2 Guests, 1 Room">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-5 d-flex justify-content-end">
            <div class="d-flex flex-column align-items-end">
                <form method="GET" action="hotels.php" class="filter-container mt-4 mx-3 py-4 px-4 filterText" style="height:auto;">
                    <p class="sortText boldText">Filter by:</p>
                    <!-- Budget -->
                    <p class="py-1">Budget:</p>
                    <div class="d-flex align-items-center gap-2 mt-0">
                        <div class="input-group" style="width: 45%;">
                            <span class="input-group-text px-2">₱</span>
                            <input type="number" step="100" name="minPrice" placeholder="Minimum" class="form-control price-input px-2">
                        </div>
                        <div>-</div>
                        <div class="input-group" style="width: 45%;">
                            <span class="input-group-text px-2">₱</span>
                            <input type="number" step="100" name="maxPrice" placeholder="Maximum" class="form-control price-input px-2">
                        </div>
                    </div>
                    <!-- Tags -->
                    <p class="mt-4">Popular Filters</p>
                    <div class="d-flex flex-column gap-1">
                        
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="applyBtn py-2 w-100">Apply</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-7">
            <p class="blueText boldText resultText pt-3">
                Results: <span class="result"></span>
            </p>
            <!-- Sorting -->
            <div class="d-flex gap-2 mb-3">
                <img src="{{ asset('/images/sort icon.png') }}" alt="sort icon" class="sortIcon mt-1">
                <p class="sortText boldText mt-1">Sort by:</p>
                <select id="sortHotels" class="form-select w-auto">
                    <option value="default">Recommended</option>
                    <option value="price_asc">Price: Low to High</option>
                    <option value="price_desc">Price: High to Low</option>
                    <option value="rating_desc">Rating: High to Low</option>
                    <option value="rating_asc">Rating: Low to High</option>
                    <option value="popular">Most Popular</option>
                </select>
            </div>
            <!-- Hotels -->
            <div class="hotels-section py-4">
                @if (DB::table('hotel')->exists())
                    @foreach ($hotels as $hotel)
                        <div class="card col-9 mb-3">
                            <div class="card-body">
                                <h2 class="card-title">{{$hotel->name}}</h2>
                                <p class="card-text">{{$hotel->overview}}</p>
                                <p class="card-text">{{$hotel->address}}</p>
                                <a href="{{ url('hoteldetails', $hotel->hotel_id) }}" class="viewBtn py-2 px-4 text-decoration-none mt-3 float-end">View</a>
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

@endsection