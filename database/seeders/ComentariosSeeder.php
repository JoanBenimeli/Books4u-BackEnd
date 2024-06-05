<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Comentario;


class ComentariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios1 = Usuario::All();
        $usuarios2 = Usuario::All();

        $usuarios1->each(function($usuario) use ($usuarios2){
            $usuario2 = $usuarios2->random();
            Comentario::factory()->count(8)->create([ 'id_usuario_emisor' => $usuario2->id,'id_usuario_receptor' => $usuario->id]);
        }); 
    }
}
