<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->unique()->text(150),
            'text'        => $this->faker->unique()->text(500),
            'category_id' => rand(1,20),
            'author_id'   => rand(1,4),
        ];
    }
}
