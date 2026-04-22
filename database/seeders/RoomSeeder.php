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
                'room_type' => 'Luxury Villa',
                'capacity' => '2 Adults',
                'no_of_beds' => '1 Queen Bed',
                'room_rates' => '1040',
                'amenities' => 'Free Breakfast, Free WiFi, Parking Space, Private Balcony, Swimming Pool'
            ],
            [
                'hotel_id' => '2',
                'room_type' => 'Superior Casita',
                'capacity' => '2 Adults, 2 Children',
                'no_of_beds' => '1 King Bed, 2 Double Beds',
                'room_rates' => '499',
                'amenities' => 'Free WiFi'
            ],
            [
                'hotel_id' => '2',
                'room_type' => 'Elite Room',
                'capacity' => '2 Adults, 2 Children',
                'no_of_beds' => '1 King Bed, 2 Double Beds',
                'room_rates' => '699',
                'amenities' => 'Free WiFi, Private Balcony'
            ],
            [
                'hotel_id' => '3',
                'room_type' => 'Junior Suite King',
                'capacity' => '2 Adults',
                'no_of_beds' => '1 King Bed',
                'room_rates' => '770',
                'amenities' => 'Free Parking, Free WiFi, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '3',
                'room_type' => 'Junior Suite Swim Up Double',
                'capacity' => '4 Adults',
                'no_of_beds' => '2 Double Beds',
                'room_rates' => '1328',
                'amenities' => 'Free Parking, Free WiFi, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '4',
                'room_type' => 'Deluxe Garden View 1 King',
                'capacity' => '2 Adults',
                'no_of_beds' => '2 Kind Bed',
                'room_rates' => '566',
                'amenities' => 'Free WiFi, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '4',
                'room_type' => 'Deluxe Garden View 2 Queens',
                'capacity' => '4 Adults',
                'no_of_beds' => '2 Queen Beds',
                'room_rates' => '566',
                'amenities' => 'Free WiFi, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '4',
                'room_type' => 'Preferred Club Family Suite',
                'capacity' => '2 Adults, 2 Children',
                'no_of_beds' => '1 King Bed',
                'room_rates' => '877',
                'amenities' => 'Free WiFi, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '5',
                'room_type' => 'Junior Room, 2 Queen Beds, Balcony, Garden View',
                'capacity' => '3 Adults',
                'no_of_beds' => '2 Queen Beds',
                'room_rates' => '699',
                'amenities' => 'Free Parking, Free WiFi, Private Balcony, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '5',
                'room_type' => 'Junior Suite, 1 King Bed, Balcony, Ocean View (Premium Luxury)',
                'capacity' => '3 Adults',
                'no_of_beds' => '1 King Bed',
                'room_rates' => '729',
                'amenities' => 'Free WiFi, Restaurant, Swimming Pool'
            ],
            [
                'hotel_id' => '5',
                'room_type' => 'Junior Suite, 1 King Bed, Balcony, Garden View (Castle)',
                'capacity' => '2 Adults',
                'no_of_beds' => '1 King Bed',
                'room_rates' => '799',
                'amenities' => 'Free WiFi, Restaurant, Swimming Pool'
            ]
        ]);
    }
}
