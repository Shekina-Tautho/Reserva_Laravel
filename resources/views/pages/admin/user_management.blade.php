@extends('layouts.admin.navbar')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<link rel="stylesheet" href="{{ asset('/css/admin.css') }}"/>

{{-- ================= USERS ================= --}}
<h2 class="fw-bold mb-4">Users</h2>

<!-- ADD USER BUTTON -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
    <img src="" alt="">
    Add User
</button>

<table class="table table-hover">
    <thead>
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
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->user_id }}">
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


{{-- ================= EMPLOYEES ================= --}}
<h2 class="fw-bold mb-4 mt-5">Employees (Admin/Staff)</h2>

<!-- ADD EMPLOYEE BUTTON -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
    Add Employee
</button>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Status</th>
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
                <span class="badge {{ $employee->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                    {{ $employee->status }}
                </span>
            </td>
            <td>
                <!-- EDIT -->
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEmployeeModal{{ $employee->employee_id }}">
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

<!-- ADD EMPLOYEE MODAL -->
<div class="modal fade" id="addEmployeeModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('employees.store') }}" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Add Employee</h5></div>
            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" placeholder="First Name" required>
                <input name="last_name" class="form-control mb-2" placeholder="Last Name" required>
                <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
                <input name="position" class="form-control mb-2" placeholder="Position" required>
                <select name="status" class="form-control">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
            <div class="modal-footer"><button class="btn btn-primary">Save</button></div>
        </form>
    </div>
</div>

@foreach($employees as $employee)
<div class="modal fade" id="editEmployeeModal{{ $employee->employee_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('employees.update', $employee->employee_id) }}" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header"><h5>Edit Employee</h5></div>
            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" value="{{ $employee->first_name }}" required>
                <input name="last_name" class="form-control mb-2" value="{{ $employee->last_name }}" required>
                <input name="email" type="email" class="form-control mb-2" value="{{ $employee->email }}" required>
                <input name="position" class="form-control mb-2" value="{{ $employee->position }}" required>
                <select name="status" class="form-control">
                    <option {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option {{ $employee->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="modal-footer"><button class="btn btn-primary">Update</button></div>
        </form>
    </div>
</div>
@endforeach

@endsection
