<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('artistas')->insert([
            [
                'nombre_artista' => 'Los Chichos',
                'genero_artista' => 'Otro'
            ],
            [
                'nombre_artista' => 'Queen',
                'genero_artista' => 'Grupo'
            ],
            [
                'nombre_artista' => 'Camarón',
                'genero_artista' => 'Marisco'
            ],
        ]);
    }
}
