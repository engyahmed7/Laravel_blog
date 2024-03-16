<?php

namespace Database\Factories;

use App\Models\User;
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
            'title' => fake()->text(100),
            'body' => fake()->paragraph,
            'enable' => random_int(0,1),
            'published_at' => fake()->dateTime,
            'user_id'=>User::factory()->create()->id,
        ];
    }
}
