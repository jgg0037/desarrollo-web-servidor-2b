<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cancions')->insert([
            [
                'titulo_cancion' => 'Bailarás con alegría',
                'duracion' => 110,
                'genero_cancion' => 'Flamenco',
                'artista_id' => 1
            ],
            [
                'titulo_cancion' => 'Bohemian Rapsody',
                'duracion' => 125,
                'genero_cancion' => 'Rock',
                'artista_id' => 2
            ],
            [
                'titulo_cancion' => 'Nana del caballo grande',
                'duracion' => 122,
                'genero_cancion' => 'Flamenco',
                'artista_id' => 3
            ],
        ]);
    }
}
