<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            [
                'path_name' => 'path/to/photo1.jpg',
                'property_id' => 1,
                'type' => 'primary',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_name' => 'path/to/photo2.jpg',
                'property_id' => 2,
                'type' => 'secondary',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_name' => 'path/to/photo1.jpg',
                'property_id' => 3,
                'type' => 'primary',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'path_name' => 'path/to/photo2.jpg',
                'property_id' => 4,
                'type' => 'primary',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
