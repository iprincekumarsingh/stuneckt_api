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
            //
            'content' => $this->faker->sentence,
            'image' => $this->faker->image,
            'user_id' => $this->faker->numberBetween(1, 50),
            'slug' => $this->faker->slug,
            'post_status' => $this->faker->randomElement(['draft', 'published', 'deleted']),


        ];
    }
}
