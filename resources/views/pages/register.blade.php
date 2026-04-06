@extends('layouts.user.content')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <input type="email" name="email" id="email" placeholder="Email address">
        <input type="password" name="password" id="password" placeholder="Password">
        <input type="text" name="first_name" id="first_name" placeholder="First Name">
        <input type="text" name="last_name" id="last_name" placeholder="Last Name">        
        <input type="text" name="phone_no" id="phone_no" placeholder="Phone Number" pattern="^093[0-9]{9}$">        
        <button type="submit">Register</button>
    </form>

    <a href="{{ route('register') }}"></a>
@endsection 