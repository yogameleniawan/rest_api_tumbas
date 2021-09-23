<?php

namespace Database\Factories;

use App\Models\CategoryTask;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CategoryTaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryTask::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::random(5),
            'name' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'icon' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
