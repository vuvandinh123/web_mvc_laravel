<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'username' => $this->faker->userName(),
            'password' => $this->faker->password(),
            'address' => $this->faker->address(),
            'image' => $this->faker->imageUrl(),
            'roles' => $this->faker->name(),
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->optional()->dateTimeBetween('-1 year', 'now'),
            'status' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
