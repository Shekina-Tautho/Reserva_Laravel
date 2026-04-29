@extends('layouts.user.content')
@include('layouts.user.navbar')

@section('title', 'User Account')

@section('content')

<!--Include User Account CSS File-->
<link rel="stylesheet" href="{{ asset('/css/profile.css') }}"/>



<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-10 mt-5 name-container px-5 d-flex align-items-center">
            <div class="profile-circle d-flex justify-content-center align-items-center rounded-circle me-2" style="width: 50px; height: 50px; background-color: #969696;">
                <span class="w-60" style="font-size: 2rem; color: white; font-weight: bold;">{{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}</span>
            </div>
            <p class="JaneDoe px-3 pt-3">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-9 d-flex flex-column align-items-center px-5">
            <p class="boldText large mt-5">MY ACCOUNT</p>
        </div>
    </div>

    <div class="row d-flex justify-content-center p-5">
        <div class="col-9 d-flex flex-column gap-4">
            <!--User Name-->
            <div class="card border-0 rounded-4 p-2 shadow">
                <div class="card-body">
                    <p class="card-text">Name</p>
                    <p class="card-text">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                </div>
            </div>

            <!--User Email-->
            <div class="card border-0 rounded-4 p-2 shadow">
                <div class="card-body">
                    <p class="card-text">Email Address</p>
                    <p class="card-text">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <!--User Password-->
            <div class="card border-0 rounded-4 p-2 shadow">
                <div class="card-body">
                    <p class="card-text">Password</p>
                    <p class="card-text">
                        <span class="password-dots">••••••••••</span>
                    </p>
                </div>
            </div>

            <!--User Phone Number-->
            <div class="card border-0 rounded-4 p-2 shadow">
                <div class="card-body">
                    <p class="card-text">Phone Number</p>
                    <p class="card-text">{{ Auth::user()->phone_no }}</p>
                </div>
            </div>

            <div class="card border-0 rounded-4 p-2 shadow">
                <div class="card-body">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="border-0 bg-white" type="submit" style="color: #0057AB;">
                            Logout
                        </button>
                    </form>
                </div>
                <!--
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <img src="{{ asset('images/logouticon.png') }}" alt="">
                        Logout
                    </button>
                </form>
                -->
            </div>

        </div>

    </div>

</div>

@endsection