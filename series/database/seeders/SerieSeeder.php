<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('series')->insert(
            [
                [
                    'titulo'=>"La casa de papel", 
                    'plataforma'=>"Netflix", 
                    'numTemporadas'=>7
                ],
                [
                    'titulo'=>"Suite", 
                    'plataforma'=>"Amazon", 
                    'numTemporadas'=>3
                ],
                [
                    'titulo'=>"Cómo conocí a vuestra madre", 
                    'plataforma'=>"Netflix", 
                    'numTemporadas'=>5
                ],
                [
                    'titulo'=>"El plan del diablo", 
                    'plataforma'=>"HBO", 
                    'numTemporadas'=>4
                ]
            ]
            );
    }
}
