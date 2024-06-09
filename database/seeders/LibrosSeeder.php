<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\LibroFactory;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Usuario;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $autores = Autor::all();
        $usuarios = Usuario::All();

        $autores->each(function($autor) use ($usuarios){
            $usuario = $usuarios->random();
            Libro::factory()->count(10)->create([ 'id_autor' => $autor->id,'id_usuario' => $usuario->id]);
        }); 
    }
}
