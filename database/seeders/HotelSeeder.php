<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*Ref:
        'name',
        'overview',
        'address',
        'is_recommended',
        'image_path'
        */

        DB::table('hotel')->insert([
            [
                'name' => 'Casa Chameleon',
                'overview' => 'Located on the northern Pacific coast with a vibrant, yet peaceful atmosphere offset by the miles of shoreline and mountain biking and hiking trails nearby, Casa Chameleon at Las Catalinas embodies the pura vida lifestyle. Enjoy complete privacy as you unwind in your individual, private pool villa or wander and wonder along the calm, sandy beaches and abundant outdoor spaces.',
                'address_id' => '1',
                'min_capacity' => 2,
                'max_capacity' => 4,
                'min_rate' => 100,
                'max_rate' => 500,
                'rating' => 5,
                'image_path' => 'casa-chameleon',
                'is_recommended' => true
            ]
        ]);
    }
}
