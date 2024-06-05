<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = ['Ficción', 'Misterio', 'Romance', 'Fantasía', 'Ciencia Ficción'];

        foreach ($generos as $genero) {
            Genero::create(['nombre' => $genero,'isVerificado'=>true]);
        }
    }
}
