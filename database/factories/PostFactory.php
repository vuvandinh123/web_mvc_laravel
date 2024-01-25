<?php

namespace Database\Factories;

use App\Models\Post;
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
    protected $model = Post::class;
    public function definition(): array
    {
        return [
            'topic_id' => 1,
            'title' => $this->faker->sentence(6),
            'slug' => $this->faker->unique()->slug(),
            'detail' => $this->faker->paragraph(4),
            'image' => $this->faker->imageUrl(),
            'type' => $this->faker->randomElement(['blog', 'news', 'review']),
            'metakey' => $this->faker->words(3, true),
            'metadesc' => $this->faker->sentence(12),
            'created_by' => 1,
            'status' => 2,
        ];
    }
}
