@extends('layouts.user.content')

@section('content')
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <input type="email" name="email" id="email" placeholder="Email address">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit">Log In</button>
    </form>

    <a href="{{ route('register') }}"></a>
@endsection