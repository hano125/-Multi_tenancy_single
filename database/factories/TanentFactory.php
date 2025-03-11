<?php

namespace Database\Factories;

use App\Models\Tanent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tanent>
 */
class TanentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Tanent::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Team X', 'Team Y']),
        ];
    }
}
