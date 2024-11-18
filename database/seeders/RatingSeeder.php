<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;
class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rating::create(['post_place_id' => 1, 'user_id' => 1, 'rating' => 1]);
        Rating::create(['post_place_id' => 1, 'user_id' => 2, 'rating' => 5]);
        Rating::create(['post_place_id' => 1, 'user_id' => 3, 'rating' => 4]);
    }
}
