<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TrainTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('train_types')->insert([
            [
                'type' => 1
            ],
            [
                'type' => 2
            ],
            [
                'type' => 3
            ]
        ]);
    }
}
