<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TemporadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('temporadas')->insert(
            [
                [
                    'serie_id'=>1, 
                    'numTemporada'=>2, 
                    'tituloTemporada'=>"Robo",
                    'numCapitulos'=>12
                ],
                [
                    'serie_id'=>1, 
                    'numTemporada'=>3, 
                    'tituloTemporada'=> "Venganza",
                    'numCapitulos'=>7
                ],
                [
                    'serie_id'=>2, 
                    'numTemporada'=>4, 
                    'tituloTemporada'=>"Reencuentro",
                    'numCapitulos'=>3
                ],
                [
                    'serie_id'=>3, 
                    'numTemporada'=>5, 
                    'tituloTemporada'=>"Plan Final",
                    'numCapitulos'=>7
                ]
            ]
            );
    }
}
