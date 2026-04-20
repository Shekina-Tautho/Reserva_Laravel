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
                'address_id' => 1,
                'min_capacity' => 2,
                'max_capacity' => null,
                'min_rate' => 1040,
                'max_rate' => null,
                'rating' => 5,
                'features' => 'Free Breakfast, Free WiFi, Parking Space, Private Balcony, Swimming Pool',
                'image_path' => 'casa-chameleon',
                'is_recommended' => true
            ],
            [
                'name' => 'Casa De Campo Resort and Villas',
                'overview' => 'Casa de Campo Resort and Villas, the most exclusive resort destination in the Caribbean, is a stunning 7,000-acre hotel, resort, and residential community in La Romana on the southeastern coast of the Dominican Republic. The tropical playground features a unique array of amenities, including an expansive marina, tennis courts, and polo facilities. The resort is also one of the most sought-after Dominican Republic golf resorts featuring three championship golf courses — including Pete Dye’s masterpiece, Teeth of the Dog, the #1 ranked course in the Caribbean and number 39 in the world.',
                'address_id' => 2,
                'min_capacity' => 4,
                'max_capacity' => null,
                'min_rate' => 499,
                'max_rate' => 699,
                'rating' => 5,
                'features' => 'Free WiFi, Private Balcony',
                'image_path' => 'casa-de-campo',
                'is_recommended' => true
            ],
            [
                'name' => 'Hyatt Zilara Cap Cana',
                'overview' => 'Hyatt Zilara Cap Cana, is an all-inclusive resort exclusively for adults, set in the beautiful gated community of Cap Cana. Located on the sought-after shores of Juanillo Beach in the Dominican Republic, Hyatt Zilara Cap Cana is a tropical paradise where guests can indulge in all-inclusive luxury surrounded by local culture, magnificent ocean views and incredible amenities. The resort offers infinity pools with swim-up bars, 25 unique restaurants and bars, a world-class fitness center and so much more. Luxurious inclusions and welcoming staff ensure a vacation at Hyatt Zilara Cap Cana will exceed guests’ expectations in every way imaginable.',
                'address_id' => 3,
                'min_capacity' => 2,
                'max_capacity' => 4,
                'min_rate' => 770,
                'max_rate' => 1328,
                'rating' => 5,
                'features' => 'Free Parking, Free WiFi, Restaurant, Swimming Pool',
                'image_path' => 'hyatt-zilara',
                'is_recommended' => true
            ],
            [
                'name' => 'Dreams La Romana',
                'overview' => 'With spectacular, white-sand shoreline and breathtaking views, Dreams La Romana Resort & Spa near Punta Cana, is the ideal destination to enjoy an endless array of family fun and relaxation. Featuring an exciting water park where guests of all ages can challenge exhilarating slides, and surrounded by lush tropical forest, the beachfront resort is perfect for a family getaway. Dreams La Romana Resort & Spa, is designed for all ages and features amenities that will surprise, including family-sized guest rooms and a variety of cuisine for all tastes.',
                'address_id' => 4,
                'min_capacity' => 2,
                'max_capacity' => 4,
                'min_rate' => 566,
                'max_rate' => 877,
                'rating' => 4,
                'features' => 'Free WiFi, Restaurant, Swimming Pool',
                'image_path' => 'dreams-la-romana',
                'is_recommended' => false
            ],
            [
                'name' => 'Sanctuary Cap Cana',
                'overview' => 'Sanctuary Cap Cana is an adults only, all inclusive resort located in Cap Cana, a private gated community retreat inside Punta Cana. Cap Cana is made up of 30,000 acres of flawless beaches, and oceanfront valley roads. It is the ideal destination for any type of traveler, with a variety of things to do, such as, water sports and outdoor activities, and high quality restaurants. This destination is also home to Punta Espada Golf Club, which is considered one of the best golf courses in the Caribbean. Cap Cana also holds one of the most spectacular marinas in the world, famous and accredited by international journals for its fishing. All of these amenities combined with Cap Cana’s turquoise waters and white sand beaches make it one of the most beautiful and desirable vacation spots in the world.',
                'address_id' => 5,
                'min_capacity' => 2,
                'max_capacity' => 3,
                'min_rate' => 699,
                'max_rate' => 799,
                'rating' => 4,
                'features' => 'Free WiFi, Restaurant, Swimming Pool',
                'image_path' => 'sanctuary-cap-cana',
                'is_recommended' => false
            ]
        ]);
    }
}
