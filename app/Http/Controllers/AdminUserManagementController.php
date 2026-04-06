<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.admin.user_management', compact('users'));
    }

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

    public function destroy($id)
    {
        User::where('user_id', $id)->delete();
        return back()->with('success', 'User deleted');
    }
}