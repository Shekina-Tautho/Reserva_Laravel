@extends('layouts.user.content')

@section('title', 'Payment Verification')

@section('content')

<!--Include Payment Verification CSS File-->
<link rel="stylesheet" href="{{ asset('/storage/css/paymentVerification.css') }}"/>

<div class="container-fluid main-div">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>

        <div class="col-12 d-flex align-items-center flex-column">
            <div class="col-10">
                <div class="progress-container d-flex justify-content-between text-center position-relative py-3">
                    <div class="step-item">
                        <div class="step completed">1</div>
                        <div class="step-label">Order Summary</div>
                    </div>
                    <div class="step-item">
                        <div class="step completed">2</div>
                        <div class="step-label">Payment Details</div>
                    </div>
                    <div class="step-item">
                        <div class="step active">3</div>
                        <div class="step-label">Confirmation</div>
                    </div>
                </div>

                <div class="base-container d-flex p-5 flex-column">
                    <img src="{{ asset('/storage/images/payment verification hotel.jpg') }}" alt="hotel room" class="img-fluid align-self-center mb-5">
                    <div class="summary">
                        <span class="blue bold xl">Your Trip Summary</span>
                        <div class="d-flex justify-content-between">
                            <span>Check In</span><span>Thu, Oct 9</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Check Out</span><span>Sat, Oct 11</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Guests</span><span>2</span>
                        </div>
                    </div>

                    <div class="breakdown mt-5">
                        <span class="blue bold xl">Pricing Breakdown</span>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Number of Nights</span><span>2</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Per Night Stay</span><span>₱10,000.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Subtotal</span><span>₱20,000.00</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tax (12%)</span><span>₱2,400.00</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between bold">
                            <span>Total</span><span>₱22,400.00</span>
                        </div>
                    </div>
                </div>

                <div class="base-container d-flex flex-column p-5 mt-5 mb-5">
                    <span class="blue bold xl mb-3">Upload Proof of Payment</span>
                    <div class="upload-box d-flex align-items-center justify-content-between base-container p-2">
                        <input type="file" id="fileInput" class="file-input" accept="image/png, image/jpeg">
                        <button type="submit" class="bold upload-btn">Submit</button>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="bold verify-btn" data-bs-toggle="modal" data-bs-target="#payVerModal">
                            Verify
                        </button>
                        <!-- Modal -->
                            <div class="modal fade" id="payVerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center p-5">
                                        <!--Contents of Modal-->
                                        <span class="blue bold xl mb-3">Payment Sent!</span>
                                        <br>
                                        <div class="p-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="150" height="150" fill="#0057AB" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                                                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
                                                <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                                            </svg>
                                        </div>
                                        <p>Your payment has been successfully sent for verification. A notification email will be sent to your account after the process has been completed.</p><br>
                                        <!--<button type="button" class="bold verify-btn" data-bs-dismiss="modal">Okay</button>-->
                                        <a href="homepage.php" class="bold verify-btn">Okay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End of Modal-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection