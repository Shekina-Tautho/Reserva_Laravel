<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--include all links required for styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--include navbar css-->
    <link rel="stylesheet" href="{{ asset('/css/navbar.css') }}"/>
</head>
<body>
<div class="container-fluid">
    <div class="row mt-4 mb-4 align-items-end">
        <div class="col-3 text-end">
            <img src="{{ asset('/images/logo.png') }}" alt="Reserva logo">
        </div>

        <div class="col-6 d-flex justify-content-center gap-5">
            <a class="tabs {{ request()->is('userhomepage') ? 'active' : '' }}" href="{{ route('user.homepage') }}">Home</a>
            <a class="tabs {{ request()->is('userhotelsearch') ? 'active' : '' }}" href="{{ route('UserHotelSearchRoute') }}">Hotels</a>
            <a class="tabs {{ request()->is('usercontacts') ? 'active' : '' }}" href="{{ route('UserContactsRoute') }}">Contacts</a>
        </div>

        <div class="col-3 d-flex gap-4 justify-content-end px-5">
            @auth
                <a href="{{ route('UserAccountRoute') }}" class="d-flex align-items-center text-decoration-none">
                    <div class="profile-circle d-flex justify-content-center align-items-center rounded-circle me-2">
                        <i class="bi bi-person-fill text-white"></i>
                    </div>
                    <span class="text-dark">{{ Auth::user()->first_name }}</span>
                </a>
            @else
                <a class="login-btn pb-1" href="">Log In</a>
                <a class="btn signup-btn p-2 px-4" href="">Sign Up</a>
            @endauth
        </div>
    </div>
</div>

<style>
.profile-circle {
    width: 35px;
    height: 35px;
    background-color: #0057AB;
    font-size: 1.2rem;
}
</style>
</body>
</html>