<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text,
            'imagen' => 'img/default/bookDefault.jpg',
            'precio' => $this->faker->numberBetween($min = 0, $max = 100),
            'paginas' => $this->faker->numberBetween($min = 1, $max = 1000),
            'id_lista' => 1
        ];
    }
}
