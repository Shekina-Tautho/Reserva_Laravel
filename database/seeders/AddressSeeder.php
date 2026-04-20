<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('address')->insert([
            [
                'country' => 'Costa Rica',
                'administrative_area' => 'Provincia de Guanacaste',
                'locality' => 'Las Catalinas Town',
                'postal_code' => '50503',
                'thoroughfare' => 'Playa Danta, Potrero'
            ]
        ]);
    }
}
