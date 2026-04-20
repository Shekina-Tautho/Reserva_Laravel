<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room')->insert([
            [
                'hotel_id' => '1',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ]
        ]);
    }
}
