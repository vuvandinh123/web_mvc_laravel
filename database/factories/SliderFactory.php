<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'link' => $this->faker->url,
            'sort_order' => $this->faker->numberBetween(1, 100),
            'position' => $this->faker->randomElement(['top', 'bottom', 'left', 'right']),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
