<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'last_name' => 'Dio',
                'first_name' => 'Elyssa',
                'phone_no' => '09123456789',
                'email' => 's1010290@usls.edu.ph',
                'password' => bcrypt('123')
            ]
        ]);
    }
}
