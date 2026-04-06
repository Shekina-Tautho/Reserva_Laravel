<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reserva Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('Assets/sidebar.css') }}">
  <link rel="stylesheet" href="{{ asset('Assets/admin.css') }}">
</head>
<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <div class="sidebar" style="width:250px;">
        <div>
            <div class="logo">
                <img src="{{ asset('Assets/adminlogo.png') }}">
            </div>

            <nav>
                <a href="{{ url('/AdminDashboard') }}">Dashboard</a>
                <a href="{{ url('/AdminBookings') }}">Bookings</a>
                <a href="{{ route('admin.user_management') }}">User Management</a>
            </nav>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link">Logout</button>
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