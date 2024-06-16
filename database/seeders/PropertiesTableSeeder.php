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
                'area' => 1500,
                'bedrooms' => 3,
                'kitchens' => 1,
                'parking' => 1,
                'type' => 'Apartment',
                'is_sold' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
