<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'rating' => $this->faker->randomElement(['G', 'PG', 'PG-13', 'R']),
            'language' => $this->faker->languageCode,
            'cover_image' => $this->faker->imageUrl(640, 480, 'movies'),
        ];
    }
}
