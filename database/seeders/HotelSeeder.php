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
                'address' => '6000, Corner Juan Luna Avenue, Cebu City, Philippines',
                'is_recommended' => true
            ],
            [
                'name' => 'Ocean View Hotel',
                'overview' => 'Ocean View Hotel provides guests with stunning panoramic views of the ocean. The rooms are spacious and well-appointed, featuring modern décor and private balconies. Guests can enjoy a rooftop restaurant, easy beach access, and activities such as snorkeling and boat tours.',
                'address' => '6100, 1 Ocean St., Manila City, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'Mountain Retreat',
                'overview' => 'Mountain Retreat is a serene getaway nestled in the mountains, perfect for nature lovers and those seeking peace. The resort offers cozy cabins, guided hiking trails, a wellness center, and an organic restaurant sourcing ingredients from local farms.',
                'address' => '6101, 5 Mountain Rd., Tagaytay City, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'City Center Inn',
                'overview' => 'City Center Inn is located in the heart of the city, offering convenient access to shopping, dining, and entertainment. The rooms are comfortable and affordable, making it ideal for travelers on a budget who still want quality accommodations.',
                'address' => '6102, 10 Central Ave., Boracay Island, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'Riverside Apartments',
                'overview' => 'Riverside Apartments provide modern, fully-furnished apartments by the riverside, ideal for both short and long-term stays. Guests can enjoy scenic river views, private balconies, communal lounges, and fully equipped kitchens.',
                'address' => '6000, 22 Riverside Blvd., Cebu City, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'Luxury Stay',
                'overview' => 'Luxury Stay offers a premium experience with elegant rooms, personalized service, and exclusive amenities. Guests can enjoy a rooftop pool, fine dining restaurants, a fitness center, and private event spaces for a truly lavish stay.',
                'address' => '6104, 15 Luxury St., Davao City, Philippines',
                'is_recommended' => true
            ],
            [
                'name' => 'Cozy Cottage',
                'overview' => 'Cozy Cottage is a charming and intimate retreat, perfect for couples and small families. Surrounded by nature, it features rustic yet comfortable interiors, a garden area, and outdoor seating to enjoy peaceful mornings and evenings.',
                'address' => '6105, 30 Cozy Lane, Baguio City, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'Sunset Villas',
                'overview' => 'Sunset Villas offers luxurious private villas with stunning sunset views. Each villa features modern amenities, private pools, and spacious living areas. Guests can enjoy personalized services, beach access, and exclusive recreational activities.',
                'address' => '6106, 45 Sunset Blvd, Iloilo City, Philippines',
                'is_recommended' => true
            ],
            [
                'name' => 'Heritage Inn',
                'overview' => 'Heritage Inn combines historical charm with modern comforts. Guests can explore the rich local culture, enjoy classic décor, and experience personalized service. The inn offers cozy rooms, a library, and traditional local cuisine.',
                'address' => '6107, 50 Heritage St., Bohol Island, Philippines',
                'is_recommended' => false
            ],
            [
                'name' => 'Green Garden Hotel',
                'overview' => 'Green Garden Hotel is set in lush greenery, offering a peaceful retreat from the city. Guests can enjoy eco-friendly accommodations, landscaped gardens, an outdoor pool, and wellness programs promoting relaxation and sustainability.',
                'address' => '6108, 65 Green Garden Rd., Palawan Island, Philippines',
                'is_recommended' => false
            ]
        ]);
    }
}
