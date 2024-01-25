<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Category::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(),
            'parent_id' => 0,
            'sort_order' => 2,
            'metakey' => $this->faker->word,
            'metadesc' => $this->faker->sentence,
            'created_by' => 1,
            'updated_by' => 1,
            'status' => 2,
        ];
    }
}
