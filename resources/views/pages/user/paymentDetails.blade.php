@extends('layouts.user.content')

@section('title', 'Payment Details')

@section('content')

<!--Include Payment Details CSS File-->
<link rel="stylesheet" href="{{ asset('/css/paymentDetails.css') }}"/>

<div class="container-fluid main-container">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
                    <img src="{{ asset('/images/' . $rooms->hotel->image_path . '.png') }}" alt="{{ $rooms->hotel->name }}" class="room-img align-self-center">
                    <p class="">{{ $hotel }}</p>
                    <div class="d-flex mt-2">
                        <i class="bi bi-geo-alt p-0 gray"></i>
                        <span class="hotel-info">{{ $hotelCity }}, {{ $hotelCountry }}</span>
                    </div>
                    <p class="mt-2 hotel-info-header bold mb-0">{{ $rooms->room_type }}</p>
                    <p class="mt-2 hotel-info-header mb-0">{{ $rooms->capacity }}</p>
                    <p class="mt-2 hotel-info-header mb-0">{{ $rooms->no_of_beds }}</p>
                    <p class="mt-2 hotel-info-header mb-0">Amenities</p>
                    <div class="d-flex gap-2 mt-0">
                        <p class="card-text">{{ $rooms->amenities }}</p>
                    </div>
                    <span class="blue bold large">₱{{ $rooms->room_rates }}</span>
                    <p class="hotel-info gray">Per night before <br>taxes and fees</p>
                </div>
            </div>


            <div class="col-8 ms-2 mt-2">

                <form action="{{ route('paymentdetails.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="details-container p-5 position-relative">
                            <p class="xl blue bold">Enter your details</p>
                            <div class="row">
                                <div class="col-6">
                                    <label for="firstName">First Name</label>
                                    <input readonly type="text" class="form-control" id="firstName" name="firstName" value="{{ Auth::user()->first_name }}">
                                </div>
                                <div class="col-6">
                                    <label for="lastName">Last Name</label>
                                    <input readonly type="text" class="form-control" id="lastName" name="lastName" value="{{ Auth::user()->last_name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="emailAddress">Email Address</label>
                                    <input readonly type="text" class="form-control" id="emailAddress" name="emailAddress" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="col-6">
                                    <label for="phoneNumber">Phone Number</label>
                                    <input readonly type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ Auth::user()->phone_no }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="check_in_date">Check-in Date</label>
                                    <input type="date" name="check_in_date" class="form-control" id="check_in_date"
                                        value="{{ $booking->check_in_date ?? '' }}"
                                        min="{{ date('Y-m-d') }}">

                                </div>
                                <div class="col-6">
                                    <label for="check_out_date">Check-out Date</label>
                                    <input type="date" name="check_out_date" class="form-control" id="check_out_date"
                                        value="{{ $booking->check_out_date ?? '' }}"
                                        min="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <p class="xl blue bold">Special Request</p>
                            <textarea class="form-control" id="request" name="request" rows="3" placeholder="i.e. extra pillows"></textarea>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="bold pay-btn text-decoration-none text-white">Pay</button>
                            </div>
                        </div>
                    </div>

                    <!--hidden values-->
                    <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                    <input type="hidden" name="hotel_id" value="{{ $rooms->hotel_id }}">
                    <input type="hidden" name="room_id" value="{{ $rooms->room_id }}">
                    <input type="hidden" name="status" value="Pending">
                </form>


                <!--
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

                    <div class="row">
                        <div class="col-6">
                            <p>Check-in Date</p>
                            <input type="date" name="check_in_date">
                        </div>
                        <div class="col-6">
                            <p>Check-out Date</p>
                            <input type="date" name="check_out_date">
                        </div>
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
                -->

            </div>
        </div>
    </div>
</div>
@endsection