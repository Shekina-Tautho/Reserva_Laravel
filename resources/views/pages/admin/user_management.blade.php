@extends('layouts.admin.navbar')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<link rel="stylesheet" href="{{ asset('/css/admin.css') }}"/>

<!-- Topbar -->
<div class="topbar d-flex align-items-center justify-content-end">
    <div class="profile-initial">
        {{ strtoupper(substr(Auth::guard('employee')->user()->first_name, 0, 1)) }}
    </div>
    <span class="text-dark">{{ Auth::guard('employee')->user()->first_name }}</span>
</div>

{{-- ================= USERS ================= --}}
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-4">    
    <div>
        <h2 class="fw-bold mb-0">Users</h2>
    </div>
    
    <div class="mt-2 mt-md-5">
        <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <img src="" alt=""> Add User
        </button>
    </div>
</div>

<div class="tb-admin-container reserva-shadow rounded-4 overflow-hidden d-none d-md-block">
    <div class="table-responsive">
        <table class="table align-middle table-hover mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone_no }}</td>
                    <td>
                        <!-- EDIT -->
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->user_id }}">
                            Edit
                        </button>
                        <!-- DELETE -->
                        <form action="{{ route('users.delete', $user->user_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center">No users found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('users.store') }}" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Add User</h5></div>
            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" placeholder="First Name" required>
                <input name="last_name" class="form-control mb-2" placeholder="Last Name" required>
                <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
                <input name="phone_no" type="phone_no" class="form-control mb-2" placeholder="Phone No." required>
                <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>
            </div>
            <div class="modal-footer"><button class="btn btn-primary">Save</button></div>
        </form>
    </div>
</div>

<!-- EDIT EMPLOYEE MODAL -->
@foreach($users as $user)
<div class="modal fade" id="editUserModal{{ $user->user_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('users.update', $user->user_id) }}" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header"><h5>Edit User</h5></div>
            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" value="{{ $user->first_name }}" required>
                <input name="last_name" class="form-control mb-2" value="{{ $user->last_name }}" required>
                <input name="email" type="email" class="form-control mb-2" value="{{ $user->email }}" required>
                <input name="phone_no" type="phone_no" class="form-control mb-2" value="{{ $user->phone_no }}" required>
            </div>
            <div class="modal-footer"><button class="btn btn-primary">Update</button></div>
        </form>
    </div>
</div>
@endforeach

<!-- MOBILE USERS -->
<div class="d-block d-md-none">

@forelse($users as $user)
    <div class="card mb-3 shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-1 fw-bold">#{{ $user->user_id }}</h6>
                    <small class="text-muted">
                        {{ $user->first_name }} {{ $user->last_name }}
                    </small>
                </div>
            </div>

            <div class="small text-muted mt-2">
                <div><strong>Email:</strong> {{ $user->email }}</div>
                <div><strong>Phone:</strong> {{ $user->phone_no }}</div>
            </div>

            <hr>

            <div class="d-flex justify-content-between">

                <button class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#editUserModal{{ $user->user_id }}">
                    Edit
                </button>

                <form action="{{ route('users.delete', $user->user_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>

            </div>

        </div>
    </div>
    @empty
    <div class="text-center text-muted">No users found</div>
    @endforelse

</div>


{{-- ================= EMPLOYEES ================= --}}
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2 mb-4">    
    <div>
        <h2 class="fw-bold mb-0">Employees (Admin/Staff)</h2>
    </div>
    
    <div class="mt-2 mt-md-5">
        <button class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
            <img src="" alt=""> Add Employee
        </button>
    </div>
</div>

<div class="tb-admin-container reserva-shadow rounded-4 overflow-hidden d-none d-md-block">
    <div class="table-responsive">
        <table class="table align-middle table-hover mb-0 user-table">
            <thead class="table-light">
                <tr>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @forelse($employees as $employee)
                <tr>
                    <td>{{ $employee->employee_id }}</td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->role }}</td>

                    <td>
                        <!-- EDIT -->
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editEmployeeModal{{ $employee->employee_id }}">
                            Edit
                        </button>
                        <!-- DELETE -->
                        <form action="{{ route('employees.delete', $employee->employee_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center">No employees found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade" id="addEmployeeModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('employees.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5>Add Employee</h5>
            </div>

            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" placeholder="First Name" required>
                <input name="last_name" class="form-control mb-2" placeholder="Last Name" required>
                <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
                <input name="position" class="form-control mb-2" placeholder="Position" required>
            </div>

            <div class="modal-footer"><button class="btn btn-primary">Save</button></div>
        </form>
    </div>
</div>

<!-- EDIT EMPLOYEE MODAL -->
@foreach($employees as $employee)
<div class="modal fade" id="editEmployeeModal{{ $employee->employee_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('employees.update', $employee->employee_id) }}" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5>Edit Employee</h5>
            </div>

            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" value="{{ $employee->first_name }}" required>
                <input name="last_name" class="form-control mb-2" value="{{ $employee->last_name }}" required>
                <input name="email" type="email" class="form-control mb-2" value="{{ $employee->email }}" required>
                <input name="position" class="form-control mb-2" value="{{ $employee->position }}" required>
            </div>

            <div class="modal-footer"><button class="btn btn-primary">Update</button></div>
        </form>
    </div>
</div>
@endforeach

<!-- MOBILE EMPLOYEES -->
<div class="d-block d-md-none">

@forelse($employees as $employee)
    <div class="card mb-4 shadow-sm border-0 rounded-4">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <h6 class="mb-1 fw-bold">#{{ $employee->employee_id }}</h6>
                    <small class="text-muted">
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </small>
                </div>
            </div>

            <div class="small text-muted mt-2">
                <div><strong>Position:</strong> {{ $employee->role }}</div>
                <div><strong>Email:</strong> {{ $employee->email }}</div>
            </div>

            <hr>

            <div class="d-flex justify-content-between">

                <button class="btn btn-sm btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#editEmployeeModal{{ $employee->employee_id }}">
                    Edit
                </button>

                <form action="{{ route('employees.delete', $employee->employee_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>

            </div>

        </div>
    </div>
    @empty
    <div class="text-center text-muted">No employees found</div>
    @endforelse

</div>

@endsection
