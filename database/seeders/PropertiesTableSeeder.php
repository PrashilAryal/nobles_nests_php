<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('properties')->insert([
            [
                'title' => 'Luxury Villa',
                'total_price' => 500000.00,
                'booking_price' => 50000.00,
                'city' => 'Los Angeles',
                'state' => 'California',
                'district' => 'Westwood',
                'area' => 5000,
                'bedrooms' => 5,
                'bathrooms' => 5,
                'description' => "Hello there",
                'video_link' => 'https://player.vimeo.com/video/73221098',
                'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834',
                'kitchens' => 1,
                'parking' => 2,
                'type' => 'Villa',
                'is_sold' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Modern Apartment',
                'total_price' => 300000.00,
                'booking_price' => 30000.00,
                'city' => 'New York',
                'state' => 'New York',
                'district' => 'Manhattan',
                'bathrooms' => 5,
                'description' => "Hello there",
                'video_link' => 'https://player.vimeo.com/video/73221098',
                'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834',
                'area' => 1500,
                'bedrooms' => 3,
                'kitchens' => 1,
                'parking' => 1,
                'type' => 'Apartment',
                'is_sold' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Home De Lux',
                'total_price' => 600000.00,
                'booking_price' => 60000.00,
                'city' => 'California',
                'state' => 'Washington',
                'district' => 'New York',
                'bathrooms' => 5,
                'description' => "Hello there",
                'video_link' => 'https://player.vimeo.com/video/73221098',
                'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834',
                'area' => 4000,
                'bedrooms' => 3,
                'kitchens' => 6,
                'parking' => 4,
                'type' => 'Villa',
                'is_sold' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Modern Villa',
                'total_price' => 400000.00,
                'booking_price' => 40000.00,
                'city' => 'New York',
                'state' => 'New York',
                'district' => 'Manhattan',
                'bathrooms' => 5,
                'description' => "Hello there",
                'video_link' => 'https://player.vimeo.com/video/73221098',
                'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834',
                'area' => 200,
                'bedrooms' => 8,
                'kitchens' => 4,
                'parking' => 6,
                'type' => 'Apartment',
                'is_sold' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
