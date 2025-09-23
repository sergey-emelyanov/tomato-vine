<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->realTextBetween(100, 300),
            'profile_id' => Profile::inRandomOrder()->first()->id,
            // 'post_id' => Post::inRandomOrder()->first()->id,
            'likes' => fake()->numberBetween(10, 50)
        ];
    }
}
