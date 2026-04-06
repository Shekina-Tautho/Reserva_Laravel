<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class AdminUserManagementController extends Controller
{
    /**
     * Show both users and employees.
     */
    public function index()
    {
        $users = User::all();
        $employees = Employee::all();

        return view('pages.admin.user_management', compact('users', 'employees'));
    }

    /**
     * Store a new user.
     */
    public function storeUser(Request $request)
    {
        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
        ]);

        return back()->with('success', 'User added');
    }

    /**
     * Update an existing user.
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::where('user_id', $id)->firstOrFail();

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => $request->filled('password') ? Hash::make($request->password) : $user->password,
            'role'       => $request->role,
        ]);

        return back()->with('success', 'User updated successfully!');
    }

    /**
     * Delete a user.
     */
    public function destroyUser($id)
    {
        User::where('user_id', $id)->delete();
        return back()->with('success', 'User deleted');
    }

    /**
     * Store a new employee.
     */
    public function storeEmployee(Request $request)
    {
        Employee::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'   => $request->role,
        ]);

        return back()->with('success', 'Employee added');
    }

    /**
     * Update an existing employee.
     */
    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::where('employee_id', $id)->firstOrFail();

        $employee->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'   => $request->role,
        ]);

        return back()->with('success', 'Employee updated successfully!');
    }

    /**
     * Delete an employee.
     */
    public function destroyEmployee($id)
    {
        Employee::where('employee_id', $id)->delete();
        return back()->with('success', 'Employee deleted');
    }
}
