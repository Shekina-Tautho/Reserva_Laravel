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
                'administrative_area' => 'Guanacaste Province',
                'locality' => 'Las Catalinas Town',
                'postal_code' => '50503',
                'thoroughfare' => 'Playa Danta, Potrero'
            ],
            [
                'country' => 'Dominican Republic',
                'administrative_area' => 'La Romana Province',
                'locality' => 'La Romana Municipality',
                'postal_code' => '22000',
                'thoroughfare' => 'Carretera La Romana - Higuey Highway'
            ],
            [
                'country' => 'Dominican Republic',
                'administrative_area' => 'La Altagracia Province',
                'locality' => 'Punta Cana Town',
                'postal_code' => '23302',
                'thoroughfare' => 'Blvd. Zona Hotelera'
            ],
            [
                'country' => 'Dominican Republic',
                'administrative_area' => 'La Romana Province',
                'locality' => 'La Romana Municipality',
                'postal_code' => '23101',
                'thoroughfare' => 'Playa Bayahibe'
            ],
            [
                'country' => 'Dominican Republic',
                'administrative_area' => 'La Altagracia Province',
                'locality' => 'Punta Cana Town',
                'postal_code' => '23302',
                'thoroughfare' => 'Proximo A Alta Bella'
            ]
        ]);
    }
}
