<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected Model
    protected $model =  Brand::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'image' => $this->faker->imageUrl(),
            'sort_order' => $this->faker->randomDigit(),
            'metakey' => $this->faker->words(3, true),
            'metadesc' => $this->faker->sentence(),
            'updated_by' => 1,
            'created_by' => 1,
        ];
    }
}
