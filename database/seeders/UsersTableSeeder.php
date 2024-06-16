<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'type' => 'buyer',
                'profile_photo' => 'path/to/profile_photo.jpg',
                'address' => '123 Main St',
                'phone_number' => '1234567890',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'type' => 'seller',
                'profile_photo' => 'path/to/profile_photo.jpg',
                'address' => '456 Elm St',
                'phone_number' => '0987654321',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password'),
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
