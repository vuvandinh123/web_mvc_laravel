<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'category_id' => 2,
            'brand_id' => 2,
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'price_sale' => $this->faker->randomFloat(2, 5, 50),
            'image' => $this->faker->imageUrl(640, 480, 'cats'),
            'qty' => $this->faker->numberBetween(1, 100),
            'detail' => $this->faker->text(),
            'metakey' => $this->faker->words(5, true),
            'metadesc' => $this->faker->sentence(),
            'updated_by' => 1,
        ];
    }
}
