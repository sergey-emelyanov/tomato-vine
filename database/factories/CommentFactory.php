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
        $post = Post::inRandomOrder()->first();
        return [
            'body' => fake()->realTextBetween(100, 300),
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'commentable_type' => Post::class,
            'commentable_id' => $post->id,
            'likes' => fake()->numberBetween(10, 50)
        ];
    }
}
