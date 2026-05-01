@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'Payment Details')

@section('content')

<!--Include Payment Details CSS File-->
<link rel="stylesheet" href="{{ asset('/css/paymentDetails.css') }}"/>

<div class="container-fluid main-container mobile-display">
    <div class="row">
        <div class="d-flex justify-content-center my-3">
            <div class="col-10 mx-auto">
                <div class="progress-container d-flex justify-content-between text-center position-relative">
                    <div class="step-item">
                        <div class="step completed">1</div>
                        <div class="step-label">Select Room</div>
                    </div>
                    <div class="step-item">
                        <div class="step active">2</div>
                        <div class="step-label">Payment Details</div>
                    </div>
                    <div class="step-item">
                        <div class="step">3</div>
                        <div class="step-label">Payment Summary</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid main-div">
    <div class="row p-lg-4">
        <div class="col-lg-4 col-12">
            <div class="border-0 rounded-4 shadow d-flex flex-column p-4 mt-2 ms-auto">
                <img src="{{ asset('/images/' . $rooms->hotel->image_path . '.png') }}" alt="{{ $rooms->hotel->name }}" class="room-img align-self-center rounded">
                <text class="pt-2" style="font-weight: bold; font-size: 1.5rem; color: #0057AB">{{ $hotel }}</text>
                <div class="d-flex mt-2">
                    <i class="bi bi-geo-alt p-0 gray"></i>
                    <text class="mx-2" style="color: #6c757d;">{{ $hotelCity }}, {{ $hotelCountry }}</text>
                </div>
                <p class="mt-2 bold mb-0" style="color: #0057AB;" >{{ $rooms->room_type }}</p>
                <text class="mt-2 hotel-info-header mb-0">
                    <i class="bi bi-person-fill" style="color: #0057AB;"></i>
                    {{ $rooms->capacity }}, {{ $rooms->no_of_beds }}
                </text>
                <p class="mt-2 hotel-info-header mb-2" style="color: #6c757d;">Amenities</p>
                <div class="d-flex gap-2 mt-0">
                    <text class="card-text mb-2" style="color: #6c757d; font-size: 0.8rem;">{{ $rooms->amenities }}</text>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="blue bold" style="font-size: 1.5rem;">₱{{ $rooms->room_rates }}</span>
                    </div>
                    <div class="col-9">
                        <p class="hotel-info gray">Per night before <br>taxes and fees</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12 mt-2 px-3 pb-lg-0 pb-5">
            <form action="{{ route('paymentdetails.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="details-container border-0 shadow p-5 position-relative">
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
                                    min="{{ date('Y-m-d') }}"
                                    required>

                            </div>
                            <div class="col-6">
                                <label for="check_out_date">Check-out Date</label>
                                <input type="date" name="check_out_date" class="form-control" id="check_out_date"
                                    value="{{ $booking->check_out_date ?? '' }}"
                                    min="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                        </div>
                        <p class="xl blue bold pt-4">Special Request</p>
                        <textarea class="form-control" id="request" name="request" rows="3" placeholder="i.e. extra pillows"></textarea>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="bold pay-btn text-decoration-none text-white">Proceed</button>
                        </div>
                    </div>
                </div>

                <!--hidden values-->
                <input type="hidden" name="user_id" value="{{ Auth::user()->user_id }}">
                <input type="hidden" name="hotel_id" value="{{ $rooms->hotel_id }}">
                <input type="hidden" name="room_id" value="{{ $rooms->room_id }}">
                <input type="hidden" name="status" value="Pending">
            </form>
        </div>
    </div>
</div>

@endsection