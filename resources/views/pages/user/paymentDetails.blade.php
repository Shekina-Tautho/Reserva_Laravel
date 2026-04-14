@extends('layouts.user.content')

@section('title', 'Payment Details')

@section('content')

<!--Include Payment Details CSS File-->
<link rel="stylesheet" href="{{ asset('css/paymentDetails.css') }}"/>

<div class="container-fluid main-container">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>
        <div class="d-flex justify-content-center my-3">
            <div class="col-10 mx-auto">
                <div class="progress-container d-flex justify-content-between text-center position-relative">
                    <div class="step-item">
                        <div class="step completed">1</div>
                        <div class="step-label">Order Summary</div>
                    </div>
                    <div class="step-item">
                        <div class="step active">2</div>
                        <div class="step-label">Payment Details</div>
                    </div>
                    <div class="step-item">
                        <div class="step">3</div>
                        <div class="step-label">Confirmation</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10 d-flex gap-5">
            <div class="col-4 ms-5">
                <div class="hotel-container mt-2 ms-auto d-flex flex-column p-4">
                    <img src="../Assets/booking page hotel.png" alt="hotel room" class="room-img align-self-center">
                    <p class="bold blue large pt-2 hotelName mb-0">Hotel A</p>
                    <div class="d-flex mt-2">
                        <i class="bi bi-geo-alt p-0 gray"></i>
                        <span class="hotel-info">Manila, Luzon</span>
                    </div>
                    <div class="d-flex gap-1 mt-1">
                        <i class="bi bi-star-fill star-icon"></i>
                        <p class="hotel-info">3/5</p>
                        <p class="hotel-info gray">(34)</p>
                        <p class="hotel-info">See reviews</p>
                    </div>
                    <p class="mt-2 hotel-info-header bold mb-0">Offers:</p>
                    <div class="d-flex gap-2 mt-0 gray">
                        <div class="offers px-3">Breakfast included</div>
                        <div class="offers px-3">Pets allowed</div>
                    </div>
                    <span class="mt-4 hotel-info-header">2 Guests, 1 Room</span>
                    <span class="blue bold large">₱10,000</span>
                    <p class="hotel-info gray">Per night before <br>taxes and fees</p>
                    <span class="blue bold large">Your Booking Details</span>
                    <div class="d-flex gap-2 hotel-info justify-content-between">
                        <div class="d-flex flex-column align-items-center mt-2">
                            <span class="gray">Check In</span>
                            <p>Dec 1, 2025</p>
                        </div>
                        <div class="d-flex flex-column align-items-center mt-2">
                            <span class="gray">Check Out</span>
                            <p>Dec 4, 2025</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 d-flex ms-2 mt-2">
                <div class="details-container d-flex flex-column p-5 position-relative">
                    <p class="xl blue bold">Enter your details</p>
                    <div class="d-flex gap-3">
                        <input type="text" placeholder="First Name" class="fname input p-2">
                        <input type="text" placeholder="Last Name" class="lname input p-2">
                    </div>
                    <div class="d-flex gap-3 mt-3">
                        <input type="text" placeholder="Email Address" class="fname input p-2">
                        <input type="text" placeholder="Phone Number" class="lname input p-2">
                    </div>
                    <input type="text" placeholder="Address" class="fname input address p-2 mt-5">
                    <div class="d-flex gap-3 mt-3">
                        <input type="text" placeholder="City" class="fname input p-2">
                        <input type="text" placeholder="Zip Code" class="lname input p-2">
                    </div>
                    <select id="country" name="country" required class="input mt-3 p-2 country">
                        <option value="" disabled selected hidden>Country/Region</option>
                        <option value="Philippines">Philippines</option>
                        <option value="United States">United States</option>
                    </select>

                    <span class="xl blue bold mt-5">Special Requests</span>
                    <span class="large ">Which type of room would you prefer?</span>
                    <label class="large py-3">
                        <input type="checkbox" name="smoking_preference" value="non-smoking" class="checkbox"> Non-smoking
                    </label>
                    <label class="large">
                        <input type="checkbox" name="smoking_preference" value="smoking" class="checkbox"> Smoking
                    </label>

                    <div class="d-flex justify-content-end mt-4">
                        <a href="paymentVerification.php" class="bold pay-btn text-decoration-none text-white">Pay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection