<?php

namespace Database\Factories;

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
            'created_at' => now(),
            'updated_at' => now(),
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'category_id' => fake()->numberBetween(1, 4),
            'slug' => fake()->slug(),
            'author' => fake()->name(),
            'is_published' => fake()->boolean(),
            'published_at' => fake()->optional()->dateTimeBetween('-1 month', 'now'),
            'featured_image' => fake()->imageUrl(640, 480, 'nature', true, 'Post Image', true),
            'excerpt' => fake()->sentence(),
        ];
    }

}
