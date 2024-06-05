<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genero;
use App\Models\Libro;

class GeneroLibroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = Genero::All();
        $libros = Libro::All();

        $libros->each(function ($libro) use ($generos) {
            $genero = $generos->random();
            $libro->generos()->attach($genero);
        });
    }
}
