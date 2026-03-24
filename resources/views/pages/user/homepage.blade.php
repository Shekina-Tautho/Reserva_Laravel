@extends('layouts.user.content')

@section('title', 'Home')

@section('content')

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <div class="col-12 mid-div d-flex flex-column align-items-center">
            <div class="col-10 mt-5 position-relative">
                <div class="img-cont d-flex justify-content-center">
                    <img src="/storage/images/homepage.png" alt="outdoor hotel" class="img-fluid rounded">

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

                    <div class="col-12 cards-container d-flex flex-column align-items-center py-5 mt-3">
                        <p>No CC's Picks available at the moment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection