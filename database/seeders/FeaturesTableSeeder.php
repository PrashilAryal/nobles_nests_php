<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'area' => 5000,
                'bedrooms' => 5,
                'kitchens' => 1,
                'parking' => 2,
                'type' => 'Villa',
                'property_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'area' => 1500,
                'bedrooms' => 3,
                'kitchens' => 1,
                'parking' => 1,
                'type' => 'Apartment',
                'property_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
