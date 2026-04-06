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
            <th>Status</th>
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
                <span class="badge {{ $user->status == 'Active' ? 'bg-success' : 'bg-danger' }}">
                    {{ $user->status }}
                </span>
            </td>
            <td>
                <!-- DELETE -->
                <form action="{{ route('users.delete', $user->user_id) }}" method="POST">
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

                <select name="status" class="form-control">
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection