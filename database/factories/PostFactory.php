<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Download>
 */
class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'slug' => $this->faker->slug,
            'title' => $this->faker->word,
            'summary' => $this->faker->sentence,
            'body' => $this->faker->realText(),
            'published_at' => today()->toDateTimeString(),
            'featured_image' => $this->faker->imageUrl(),
            'featured_image_caption' => $this->faker->sentence,
            'user_id' => 1,
            'meta' => [
                'title' => $this->faker->sentence,
                'description' => $this->faker->sentence,
                'canonical_link' => $this->faker->sentence,
            ],
        ];
    }
}

