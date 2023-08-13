<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lang' => 'vi',
            'title' => fake()->realText(10),
            'summary' => fake()->realText(50),
            'content' => '<p>' . fake()->realText(1000) . '</p>',
        ];
    }
}
