@extends('layouts.user.content')

@section('content')

<link rel="stylesheet" href="{{ asset('css/signup.css') }}">

<div class="main-div">

    <!-- LEFT SECTION -->
    <div class="d-flex flex-column justify-content-center align-items-center w-50 position-relative">
        <div class="bg-overlay"></div>
        <img class="bg-section-img"
            src="{{ asset('images/reserva-branding.png') }}" 
        >
    </div>

    <div class="login-section d-flex justify-content-center align-items-center w-50">
        <div class="form-login flex-column">
            <h1 class="login-heading text-center mx-auto mb-4">Let's Get Started</h1>

            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST">
                @csrf

                <input 
                    type="email" 
                    name="email" 
                    placeholder="example@email.com"
                    class="form-control signup-input mb-3"
                    value="{{ old('email') }}"
                    required
                >

                <div class="d-flex gap-2 mb-3">
                    <input 
                        type="text" 
                        name="first_name" 
                        placeholder="First Name"
                        class="form-control signup-input"
                        value="{{ old('first_name') }}"
                        required
                    >

                    <input 
                        type="text" 
                        name="last_name" 
                        placeholder="Last Name"
                        class="form-control signup-input"
                        value="{{ old('last_name') }}"
                        required
                    >
                </div>

                <input 
                    type="password" 
                    name="password" 
                    placeholder="••••••••"
                    class="form-control signup-input mb-3"
                    required
                >

                <input 
                    type="text" 
                    name="phone_no" 
                    placeholder="Phone Number"
                    class="form-control signup-input mb-4"
                    value="{{ old('phone_no') }}"
                    pattern="^093[0-9]{9}$"
                >

                <button type="submit" id="signup-button" class="w-100 py-2">
                    Sign Up
                </button>
            </form>

            <p class="terms mt-3">
                By signing up, you agree to our 
                <span class="blue">Terms of Use</span> and 
                <span class="blue">Privacy Policy</span>.
            </p>

            <p class="register-p">
                Already have an account? 
                <a href="{{ route('login') }}" class="signin-link">Sign in.</a>
            </p>

        </div>
    </div>

</div>

@endsection