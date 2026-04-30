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
    <div>
        <div class="row p-lg-4 p-2">
            <!--Laravel Logo-->
            <div class="col-3 align-items-center justify-content-center">
                <img src="{{ asset('/images/laravel_logo.svg') }}" alt="Reserva logo" class="img-fluid">
            </div>
            <!--Navigation Links-->
            <div class="col-6 d-flex align-items-center justify-content-center">
                <nav class="mt-lg-3">
                    <ul class="nav-links">
                        <li><a class="tabs {{ request()->is('userhomepage') ? 'active' : '' }}" href="{{ route('user.homepage') }}">Home</a></li>
                        <li><a class="tabs {{ request()->is('userhotelsearch') ? 'active' : '' }}" href="{{ route('UserHotelSearchRoute') }}">Hotels</a></li>
                        <li><a class="tabs {{ request()->is('userreservations') ? 'active' : '' }}" href="{{ route('UserReservationsRoute') }}">Bookings</a></li>
                        <li><a class="tabs {{ request()->is('usercontacts') ? 'active' : '' }}" href="{{ route('UserContactsRoute') }}">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <!--User Name & Icon-->
            <div class="col-3 d-flex justify-content-end d-lg-flex d-md-flex d-none px-5 gap-4">
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

        <!--MOBILE NAVBAR-->
        <div class="row vw-100 d-lg-none"> 
            <nav class="fixed-bottom">
                <ul class="mobile-nav d-flex justify-content-around align-items-center bg-white shadow p-2 m-0">
                    <li>
                        <a class="{{ request()->is('userhomepage') ? 'active' : '' }}" href="{{ route('user.homepage') }}">
                            <i class="bi bi-house-door-fill" style="color: #0057AB;"></i>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('userhotelsearch') ? 'active' : '' }}" href="{{ route('UserHotelSearchRoute') }}">
                            <i class="bi bi-house-fill" style="color: #0057AB;"></i>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('userreservations') ? 'active' : '' }}" href="{{ route('UserReservationsRoute') }}">
                            <i class="bi bi-calendar-week-fill" style="color: #0057AB;"></i>
                        </a>
                    </li>
                    <li>
                        <a class="{{ request()->is('usercontacts') ? 'active' : '' }}" href="{{ route('UserContactsRoute') }}">
                            <i class="bi bi-telephone-fill" style="color: #0057AB;"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('UserAccountRoute') }}" class="d-flex align-items-center text-decoration-none">
                            <i class="bi bi-person-fill" style="color: #0057AB;"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</body>
</html>