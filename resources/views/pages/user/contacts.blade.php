@extends('layouts.user.content')

@section('title', 'Contacts')

@section('content')

<!--Include Contacts CSS File-->
<link rel="stylesheet" href="{{ asset('/css/contacts.css') }}"/>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @include('layouts.user.navbar')
        </div>
        <div class=" col-12 d-flex flex-column align-items-center justify-content-center main-div">
            <div class="col-12 d-flex align-items-center justify-content-center flex-column mb-5">
                <div class="d-flex align-items-center flex-column text-center py-5">
                    <p class="xl bold blue">Contact Us</p>
                    <p class="text-align-center">Have questions or special requests? Reach out to us anytime — <br>
                    we’re here to make your stay memorable
                    </p>
                </div>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-10 d-flex align-items-center">
                    <div class="col-4 d-flex flex-column align-items-center text-center">
                        <i class="bi bi-telephone"></i>
                        <p class="bold large mt-4">Make a Call</p>
                        <p>
                            For immediate assistance with your <br>
                            reservations or inquiries.
                        </p>
                        <p class="blue">+63 927 456 8910</p>
                    </div>
                    <div class="col-4 d-flex flex-column align-items-center text-center">
                        <i class="bi bi-envelope"></i>
                        <p class="bold large mt-4">Send a Mail</p>
                        <p>
                            For booking confirmations, feedback, <br>
                            or partnership inquiries.
                        </p>
                        <p class="blue">support@reserva.com</p>
                    </div>
                    <div class="col-4 d-flex flex-column align-items-center text-center">
                        <i class="bi bi-chat"></i>
                        <p class="bold large mt-4">Chat with Us</p>
                        <p>
                            Instantly connect with our customer <br>
                            core team for quick help.
                        </p>
                        <p class="blue">chat.reserva.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection