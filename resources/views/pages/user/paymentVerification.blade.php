@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'Payment Verification')

@section('content')

<!--Include Payment Verification CSS File-->
<link rel="stylesheet" href="{{ asset('/css/paymentVerification.css') }}"/>
<div class="container-fluid main-container mobile-display mb-3">
    <div class="row">
        <div class="d-flex justify-content-center my-3">
            <div class="col-10 mx-auto">
                <div class="progress-container d-flex justify-content-between text-center position-relative">
                    <div class="step-item">
                        <div class="step completed">1</div>
                        <div class="step-label">Select Room</div>
                    </div>
                    <div class="step-item">
                        <div class="step completed">2</div>
                        <div class="step-label">Payment Details</div>
                    </div>
                    <div class="step-item">
                        <div class="step active">3</div>
                        <div class="step-label">Payment Summary</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12 d-flex align-items-center flex-column">
            <div class="col-10">
                <div class="base-container border-0 shadow d-flex p-lg-5 p-3 flex-column">
                    <img src="{{ asset('/images/' . $hotel_img . '.png') }}" alt="{{ $hotel_name }}" class="img-fluid rounded-4 align-self-center mb-5">
                    <div class="summary">
                        <span class="blue bold xl mobile-text">Your Trip Summary</span>
                        <div class="d-flex justify-content-between">
                            <span>Check In</span><span>{{ $checkInDate }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Check Out</span><span>{{ $checkOutDate }}</span>
                        </div>
                    </div>

                    <div class="breakdown mt-5">
                        <span class="blue bold xl mobile-text">Pricing Breakdown</span>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Number of Nights</span><span>{{ $numberOfNights }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Per Night Stay</span><span>₱{{ number_format($room_rates, 2) }}</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between bold">
                            <span>Total</span><span>${{ number_format($total_amount, 2) }}</span>
                        </div>
                        <a href="{{ url('userhomepage') }}" class="bold upload-btn mt-2 float-end" role="button" style="text-decoration: none; text-align: center">Okay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection