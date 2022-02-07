<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ForumTopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(6),
            'body' => $this->faker->realText,
        ];
    }
}
