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
                'feature_id' => 1,
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
                'feature_id' => 2,
                'is_sold' => false,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
