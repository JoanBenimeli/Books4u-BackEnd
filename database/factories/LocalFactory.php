<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Local>
 */
class LocalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,
            'latitud' => $this->faker->latitude,
            'longitud' => $this->faker->longitude,
            'direccion' => $this->faker->address,
            'poblacion' => $this->faker->city,
            'provincia' => $this->faker->state,
            'comunidad' => $this->faker->country,
            'verificado' => true
        ];
    }
}
