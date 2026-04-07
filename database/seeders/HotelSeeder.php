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
                'name' => 'Radisson Blu',
                'overview' => 'Radisson Blu is a luxury hotel offering modern amenities and breathtaking waterfront views. Guests can enjoy elegantly designed rooms, a full-service spa, gourmet dining options, and personalized concierge services, ensuring a relaxing and memorable stay.',
                'address' => '6100, 1 Ocean St., Manila, Philippines',
                'is_recommended' => true
            ],
            [
                'name' => 'Ocean View Hotel',
                'overview' => 'Ocean View Hotel provides guests with stunning panoramic views of the ocean. The rooms are spacious and well-appointed, featuring modern décor and private balconies. Guests can enjoy a rooftop restaurant, easy beach access, and activities such as snorkeling and boat tours.',
                'address' => '6100, 1 Ocean St., Manila, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'Mountain Retreat',
                'overview' => 'Mountain Retreat is a serene getaway nestled in the mountains, perfect for nature lovers and those seeking peace. The resort offers cozy cabins, guided hiking trails, a wellness center, and an organic restaurant sourcing ingredients from local farms.',
                'address' => '6101, 5 Mountain Rd., Tagaytay, Philippines',
                'is_recommended' => true
            ]
        ]);
    }
}
