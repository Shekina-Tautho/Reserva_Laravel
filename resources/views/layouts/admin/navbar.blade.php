<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reserva Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar" style="width:250px;">
        <div>
            <div class="logo">
                <img src="{{ asset('images/adminlogo.png') }}">
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

        <form method="POST" action="{{ route('logout') }}">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>