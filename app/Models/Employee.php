<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';       // explicitly set table name
    protected $primaryKey = 'employee_id'; // adjust if your PK is employee_id

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role',   // or role if you use that
    ];
}
