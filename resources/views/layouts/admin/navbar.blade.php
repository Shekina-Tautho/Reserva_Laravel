<div class="sidebar">
    <div>
        <!-- Logo -->
        <div class="logo">
            <img src="{{ asset('Assets/adminlogo.png') }}" alt="Reserva admin logo">
        </div>

        <!-- Navigation -->
        <nav>
            <a href="{{ url('/AdminDashboard') }}" class="{{ ($activePage ?? '') === 'dashboard' ? 'active' : '' }}">
                <img src="{{ asset('Assets/dashboardicon.png') }}" alt="Dashboard icon">Dashboard
            </a>

            <a href="{{ url('/AdminBookings') }}" class="{{ ($activePage ?? '') === 'bookings' ? 'active' : '' }}">
                <img src="{{ asset('Assets/bookingsicon.png') }}" alt="Bookings icon">Bookings
            </a>
            <a href="{{ url('/AdminUserManagement') }}" class="{{ ($activePage ?? '') === 'user_management' ? 'active' : '' }}">
                <img src="{{ asset('Assets/customersicon.png') }}" alt="Customers icon">Customers
            </a>
            <a href="{{ url('/AdminUserManagement') }}" class="{{ ($activePage ?? '') === 'user_management' ? 'active' : '' }}">
                <img src="{{ asset('Assets/usermanagementicon.png') }}" alt="User management icon">User Management
            </a>
        </nav>
    </div>

  <!-- Logout -->
<form method="POST" action="{{ route('logout') }}" class="mt-auto">
    @csrf
    <button type="submit" class="logout-btn btn btn-link d-flex align-items-center">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
    </button>
</form>
