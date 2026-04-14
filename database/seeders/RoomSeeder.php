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
            ],
            [
                'hotel_id' => '1',
                'room_type' => 'Deluxe Room',
                'capacity' => '4 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '2',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '2',
                'room_type' => 'Deluxe Room',
                'capacity' => '6 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '3',
                'room_type' => 'Standard Room',
                'capacity' => '4 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '3',
                'room_type' => 'Cabin',
                'capacity' => '8 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '3',
                'room_type' => 'Bungalow',
                'capacity' => '10 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '4',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '5',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '6',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '7',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '8',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '9',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ],
            [
                'hotel_id' => '10',
                'room_type' => 'Standard Room',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Single',
                'room_rates' => '4000',
                'amenities' => 'Free WiFi, TV'
            ]
        ]);
    }
}
