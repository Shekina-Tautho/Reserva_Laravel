<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                'last_name' => 'Gar',
                'first_name' => 'Mar',
                'phone_no' => '09671686897',
                'email' => 'mgift12345@gmail.com',
                'password' => Hash::make('admin12345'),
                'role' => 'admin'
            ],
        ]);
    }
}
