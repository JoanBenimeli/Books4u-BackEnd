<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            AutoresSeeder::class,
            UsuariosSeeder::class,
            //ListasSeeder::class,
            //LibrosSeeder::class,
            GeneroSeeder::class,
            //GeneroLibroSeeder::class,
            //ComentariosSeeder::class,
            //LocalesSeeder::class
        ]); 
    }
}
