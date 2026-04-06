<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserManagementController extends Controller
{
    /**
     * Display all users.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.user_management', compact('users'));
    }

    /**
     * Store a new user.
     */
    public function store(Request $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            'status'     => $request->status,
        ]);

        return back()->with('success', 'User added');
    }

    /**
     * Update an existing user.
     */
    public function update(Request $request, $id)
    {
        $user = User::where('user_id', $id)->firstOrFail();

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            // Only update password if provided
            'password'   => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'role'       => $request->role,
            'status'     => $request->status,
        ]);

        return back()->with('success', 'User updated successfully!');
    }

    /**
     * Delete a user.
     */
    public function destroy($id)
    {
        User::where('user_id', $id)->delete();
        return back()->with('success', 'User deleted');
    }
}
