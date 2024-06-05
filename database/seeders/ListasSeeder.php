<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lista;
use App\Models\Usuario;

class ListasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            Lista::create(['id_usuario' => $usuario->id]);
        }
    }
}
