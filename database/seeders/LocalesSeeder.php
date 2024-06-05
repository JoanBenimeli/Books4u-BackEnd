<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Local;
use App\Models\Usuario;

class LocalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            Local::factory()->create(['email_usuario' => $usuario->email]);
        }
    }
}
