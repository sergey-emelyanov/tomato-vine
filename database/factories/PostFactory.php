<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realTextBetween(10, 25),
            'category_id' => Category::inRandomOrder()->first()->id,
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'body' => fake()->realTextBetween(100, 300),
            'published_at' => fake()->dateTime(),
            'likes' => fake()->numberBetween(10, 50),
            'is_published' => fake()->boolean()
        ];
    }
}
