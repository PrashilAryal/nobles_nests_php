<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'The Ultimate Guide to Buying Luxury Villas in 2024',
                'details' => 'Explore the latest trends, tips, and tricks for buying luxury villas in 2024. From market analysis to location insights, this guide has everything you need to make an informed decision.',
                'author' => 'John Doe',
                'date' => '2024-08-01',
                'image' => 'luxury_villa_guide.jpg',
            ],
            [
                'title' => 'Top 10 Waterfront Properties for Sale This Year',
                'details' => 'Discover the top waterfront properties that are currently on the market. These exclusive homes offer stunning views, private beaches, and luxurious amenities.',
                'author' => 'Jane Smith',
                'date' => '2024-08-10',
                'image' => 'waterfront_properties.jpg',
            ],
            [
                'title' => 'How to Invest in Premium Real Estate',
                'details' => 'Investing in premium real estate can be a lucrative venture. Learn the best strategies for identifying high-value properties and maximizing your return on investment.',
                'author' => 'Alice Johnson',
                'date' => '2024-07-15',
                'image' => 'premium_real_estate_investment.jpg',
            ],
            [
                'title' => 'The Benefits of Owning a Luxury Home',
                'details' => 'Owning a luxury home is more than just a status symbol. Explore the numerous benefits, from tax advantages to the joy of living in a high-end property.',
                'author' => 'Michael Brown',
                'date' => '2024-07-22',
                'image' => 'benefits_of_luxury_home.jpg',
            ],
            [
                'title' => 'Exploring Modern Architecture in Luxury Real Estate',
                'details' => 'Modern architecture is reshaping luxury real estate. Dive into the key features and design principles that make these properties stand out.',
                'author' => 'Emily White',
                'date' => '2024-08-18',
                'image' => 'modern_architecture_luxury.jpg',
            ],
        ]);
    }
}
