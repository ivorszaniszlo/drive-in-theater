<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seed films table with test data
        for ($i = 0; $i < 10; $i++) {
            $filmId = DB::table('films')->insertGetId([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'rating' => $faker->randomElement(['G', 'PG', 'PG-13', 'R']),
                'language' => $faker->randomElement(['English', 'French', 'German', 'Spanish']),
                'cover_image' => $faker->imageUrl(640, 480, 'movies', true),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            // Seed screenings table for each film
            DB::table('screenings')->insert([
                'film_id' => $filmId,
                'time' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
                'available_seats' => $faker->numberBetween(20, 100),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
