<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trains')->insert([
            [
                'name' => 'Glacier Express',
                'passengers' => 2500,
                'year' => 1930,
                'train_type_id' => 3
            ],
            [
                'name' => 'The Ghan',
                'passengers' => 1500,
                'year' => 2010,
                'train_type_id' => 2
            ],
            [
                'name' => 'VSOE',
                'passengers' => 1700,
                'year' => 2015,
                'train_type_id' => 1
            ]
        ]);
    }
}
