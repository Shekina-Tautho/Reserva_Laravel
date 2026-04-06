<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Admin | Dashboard</title>

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('Assets/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/admin_dashboard.css') }}">
</head>
<body>
    @include('layouts.admin.navbar')

    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar d-flex align-items-center justify-content-between">
            <div class="profile-initial">J</div>
            <span>John Doe [Admin]</span>
        </div>

        <!-- Dashboard Stats -->
        <h2 class="fw-bold mb-2">Dashboard</h2>
        <div class="row pt-3 m-3 pb-5">
            <div class="dashboard-data-card col text-center p-3 m-3 reserva-shadow rounded-4">
                <i class="bi bi-calendar-check display-4"></i>
                <h5>Total Bookings</h5>
                <h4 class="fw-bold">2</h4>
            </div>
            <div class="dashboard-data-card col text-center p-3 m-3 reserva-shadow rounded-4">
                <i class="bi bi-people display-4"></i>
                <h5>Active Users</h5>
                <h4 class="fw-bold">2</h4>
            </div>
            <div class="dashboard-data-card col text-center p-3 m-3 reserva-shadow rounded-4">
                <i class="bi bi-person-badge display-4"></i>
                <h5>Admin Users</h5>
                <h4 class="fw-bold">2</h4>
            </div>
            <div class="dashboard-data-card col text-center p-3 m-3 reserva-shadow rounded-4">
                <i class="bi bi-hourglass-split display-4"></i>
                <h5>Pending Bookings</h5>
                <h4 class="fw-bold">2</h4>
            </div>
        </div>

        <!-- Recent Bookings -->
        <h2 class="fw-bold mb-2">Recent Bookings</h2>
        <div class="tb-dashboard-container my-5 reserva-shadow rounded-4 overflow-hidden">
            <table class="table align-middle table-hover mb-0 user-table">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="ps-3">ID</th>
                        <th scope="col">Guest Name</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Check-In</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td class="ps-3">Johnny Thor</td>
                        <td>Radisson Blu</td>
                        <td>2025-10-10</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <i class="bi bi-eye text-primary"></i>
                                <i class="bi bi-pencil text-warning"></i>
                                <i class="bi bi-trash text-danger"></i>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td class="ps-3">Janette Dy</td>
                        <td>Go Hotels</td>
                        <td>2025-10-10</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <i class="bi bi-eye text-primary"></i>
                                <i class="bi bi-pencil text-warning"></i>
                                <i class="bi bi-trash text-danger"></i>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
