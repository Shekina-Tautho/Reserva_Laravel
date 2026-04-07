<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Must be logged in via employee guard
        if (!Auth::guard('employee')->check()) {
            return redirect()->route('employee.login');
        }

        // If you want to enforce admin-only access:
        $employee = Auth::guard('employee')->user();
        if ($employee->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
