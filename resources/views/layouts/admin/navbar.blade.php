<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reserva Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('/css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
</head>
<body>

<div class="d-flex">
    <!-- SIDEBAR (desktop only) -->
    <div class="sidebar d-none d-lg-flex flex-column" style="width:250px; min-height:100vh;">
        <div>
            <!--Laravel Logo-->
            <div class="logo align-items-center justify-content-center">
                <img src="{{ asset('/images/adminlogo.png') }}" alt="Reserva logo" class="img-fluid">
            </div>

            <nav>
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('images/dashboardicon.png') }}" alt="">
                    Dashboard
                </a>
                <a href="{{ route('admin.booking') }}">
                    <img src="{{ asset('images/bookingsicon.png') }}" alt="">
                    Bookings
                </a>
                <a href="{{ route('admin.hotel') }}">
                    <i class="fa-solid fa-hotel"></i>
                    Hotels
                </a>
                <a href="{{ route('admin.room') }}">
                    <i class='fas fa-door-open'></i>
                    Rooms
                </a>
                <a href="{{ route('admin.user_management') }}">
                    <img src="{{ asset('images/customersicon.png') }}" alt="">
                    Users
                </a>
            </nav>
        </div>

        <!-- LOGOUT stays at bottom -->
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="logout-btn">
                <img src="{{ asset('images/logouticon.png') }}" alt="">
                Logout
            </button>
        </form>
    </div>

    <!-- PAGE CONTENT APPEARS HERE -->
    <div class="main-content w-100 p-4">
        @yield('content')
    </div>

</div>

<!-- MOBILE NAVBAR -->
<div class="d-lg-none">
    <!--Logo-->
    <div class="fixed-top bg-white py-2 shadow-sm px-3 d-flex justify-content-between align-items-center">
    
        <!-- Left: Logo -->
        <img src="{{ asset('/images/adminlogo.png') }}" 
            alt="Reserva logo" 
            class="img-fluid" 
            style="max-height:50px;">

        <!-- Right: User -->
        <div class="d-flex align-items-center gap-2">
            <div class="profile-initial">
                {{ strtoupper(substr(Auth::guard('employee')->user()->first_name, 0, 1)) }}
            </div>
            <span class="text-dark">
                {{ Auth::guard('employee')->user()->first_name }}
            </span>
        </div>

    </div>

    <nav class="fixed-bottom w-100">
        <ul class="mobile-nav d-flex justify-content-around align-items-center bg-white shadow p-2 m-0">
            <li>
                <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-card-list" style="color:#0057AB;"></i>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.booking') ? 'active' : '' }}" href="{{ route('admin.booking') }}">
                    <i class="bi bi-calendar-check-fill" style="color:#0057AB;"></i>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.hotel') ? 'active' : '' }}" href="{{ route('admin.hotel') }}">
                    <i class="fa-solid fa-hotel" style="color:#0057AB;"></i>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.room') ? 'active' : '' }}" href="{{ route('admin.room') }}">
                    <i class="fas fa-door-open" style="color:#0057AB;"></i>
                </a>
            </li>
            <li>
                <a class="{{ request()->routeIs('admin.user_management') ? 'active' : '' }}" href="{{ route('admin.user_management') }}">
                    <i class="bi bi-people-fill" style="color:#0057AB;"></i>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn p-0 border-0 bg-transparent">
                        <i class="bi bi-box-arrow-right" style="color:#0057AB;"></i>
                    </button>
                </form>
            </li>
        </ul>
    </nav>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>