<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            [
                'created_date' => now(),
                'property_id' => 1,
                'buyer_id' => 1,
                'seller_id' => 2,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'created_date' => now(),
                'property_id' => 2,
                'buyer_id' => 1,
                'seller_id' => 2,
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
