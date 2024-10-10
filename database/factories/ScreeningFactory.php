<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Screening;
use App\Models\Film;

class ScreeningFactory extends Factory
{
    protected $model = Screening::class;

    public function definition()
    {
        return [
            'film_id' => Film::factory(),
            'datetime' => $this->faker->dateTimeBetween('+1 days', '+2 weeks'),
            'available_seats' => $this->faker->numberBetween(20, 100),
        ];
    }
}
