@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'Contacts')

@section('content')

<!--Include Contacts CSS File-->
<link rel="stylesheet" href="{{ asset('/css/contacts.css') }}"/>

<div class="container-fluid">

    <div class="row mobile-display">
        <div class=" col-12 d-flex flex-column align-items-center justify-content-center main-div">
            <div class="col-12 d-flex align-items-center justify-content-center flex-column mb-3">
                <div class="d-flex align-items-center flex-column text-center py-5">
                    <p class="xl bold blue">Contact Us</p>
                    <p class="text-align-center">Have questions or special requests? Reach out to us anytime — <br>
                    we’re here to make your stay memorable
                    </p>
                </div>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-center px-5">
                <div class="col-lg-4 col-12 d-flex flex-column align-items-center text-center">
                    <i class="bi bi-telephone contactsIcon"></i>
                    <p class="bold large mt-4">Make a Call</p>
                    <p>
                        For immediate assistance with your <br>
                        reservations or inquiries.
                    </p>
                    <p class="blue">+63 927 456 8910</p>
                </div>
                <div class="col-lg-4 col-12 d-flex flex-column align-items-center text-center">
                    <i class="bi bi-envelope contactsIcon"></i>
                    <p class="bold large mt-4">Send a Mail</p>
                    <p>
                        For booking confirmations, feedback, <br>
                        or partnership inquiries.
                    </p>
                    <p class="blue">support@reserva.com</p>
                </div>
                <div class="col-lg-4 col-12 d-flex flex-column align-items-center text-center">
                    <i class="bi bi-chat contactsIcon"></i>
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

<div class="container-fluid d-lg-none ">
    <!--FOR MOBILE VIEW-->
    <div class="row py-5">
        <p class="d-flex justify-content-center xl bold blue">Contact Us</p>
        <text class="d-flex justify-content-center">Have questions or special requests?</text>
        <text class="d-flex justify-content-center">Reach out to us anytime —</text>
        <text class="d-flex justify-content-center">we’re here to make your stay memorable</text>
    </div>
    <div class="row p-4 mb-2">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <i class="bi bi-telephone" style="font-size: 3.5rem; color: #0057AB;"></i>
        </div>
        <div class="col-8">
            <text class="bold large mt-4">Make a Call<br></text>
            <text>For immediate assistance with your reservations or inquiries.<br></text>
            <text class="blue">support@reserva.com<br></text>
        </div>
    </div>

    <div class="row p-4 mb-2">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <i class="bi bi-envelope" style="font-size: 3.5rem; color: #0057AB;"></i>
        </div>
        <div class="col-8">
            <text class="bold large mt-4">Send a Mail<br></text>
            <text>For booking confirmations, feedback, or partnership inquiries.<br></text>
            <text class="blue">+63 927 456 8910<br></text>
        </div>
    </div>

    <div class="row p-4">
        <div class="col-4 d-flex justify-content-center align-items-center">
            <i class="bi bi-chat" style="font-size: 3.5rem; color: #0057AB;"></i>
        </div>
        <div class="col-8">
            <text class="bold large mt-4">Chat with Us<br></text>
            <text>Instantly connect with our customer core team for quick help.<br></text>
            <text class="blue">chat.reserva.com<br></text>
        </div>
    </div>
</div>
@endsection