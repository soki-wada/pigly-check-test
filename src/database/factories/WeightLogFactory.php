<?php

namespace Database\Factories;

use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'user_id' => '1',
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 50, 99.9),
            'calories' => $this->faker->numberBetween(0, 9999),
            'exercise_time' =>  Carbon::createFromTime(rand(0, 23), rand(0, 59))->format('H:i'),
            'exercise_content' => $this->faker->realText(30)
        ];
    }
}
