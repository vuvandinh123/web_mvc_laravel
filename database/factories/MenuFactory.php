<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Menu::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'link' => $this->faker->url(),
            'table_id' => $this->faker->numberBetween(1, 10),
            'type' => $this->faker->randomElement(['pdf', 'jpg', 'png', 'doc']),
            'created_by' => 1,
            'updated_by' => 1,
            'status' => 2,
        ];
    }
}
