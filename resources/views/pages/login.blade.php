@extends('layouts.user.content')

@section('content')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="main-div">

    <!-- LEFT SECTION -->
    <div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative">
        <div class="bg-overlay"></div>
        <img class="bg-section-img"
            src="{{ asset('images/reserva-branding.png') }}" 
        >
    </div>

    <div class="login-section d-flex justify-content-center align-items-center w-50">
        <div class="form-login text-center">
            <h1 class="login-heading mb-4">Welcome Back!</h1>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <input 
                    type="email" 
                    name="email" 
                    placeholder="example@email.com"
                    class="form-control login-input mb-3"
                    value="{{ old('email') }}"
                    required
                >
                <input 
                    type="password" 
                    name="password" 
                    placeholder="••••••••"
                    class="form-control login-input login-password mb-4"
                    required
                >
                <button type="submit" id="login-button" class="w-100 py-2">
                    Log In
                </button>
            </form>

            <p class="register-p">
                Not a member? 
                <a href="{{ route('register') }}">Register Now</a>
            </p>

        </div>
    </div>

</div>

@endsection