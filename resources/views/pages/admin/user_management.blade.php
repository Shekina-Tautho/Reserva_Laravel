@extends('layouts.admin.navbar')

@section('content')

<h2 class="fw-bold mb-4">Admin Users</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<!-- ADD BUTTON -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
    Add User
</button>

<table class="table table-hover">
    <thead>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($users as $user)
        <tr>
            <td>{{ $user->user_id }}</td>
            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>
                <!-- EDIT -->
                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->user_id }}">
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
        <tr>
            <td colspan="6" class="text-center">No users found</td>
        </tr>
        @endforelse
    </tbody>
</table>

<!-- ADD USER MODAL -->
<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('users.store') }}" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5>Add User</h5>
            </div>

            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" placeholder="First Name" required>
                <input name="last_name" class="form-control mb-2" placeholder="Last Name" required>
                <input name="email" type="email" class="form-control mb-2" placeholder="Email" required>
                <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>

                <select name="role" class="form-control mb-2">
                    <option>User</option>
                    <option>Admin</option>
                </select>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@foreach($users as $user)
<div class="modal fade" id="editModal{{ $user->user_id }}">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('users.update', $user->user_id) }}" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5>Edit User</h5>
            </div>

            <div class="modal-body">
                <input name="first_name" class="form-control mb-2" value="{{ $user->first_name }}" required>
                <input name="last_name" class="form-control mb-2" value="{{ $user->last_name }}" required>
                <input name="email" type="email" class="form-control mb-2" value="{{ $user->email }}" required>

                <select name="role" class="form-control mb-2">
                    <option {{ $user->role == 'User' ? 'selected' : '' }}>User</option>
                    <option {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endforeach


@endsection