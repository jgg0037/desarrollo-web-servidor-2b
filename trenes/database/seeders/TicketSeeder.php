<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tickets')->insert([
            [
                'date' => '2023-07-07',
                'price' => 100,
                'train_id' => 3,
                'ticket_type_id' => 3
            ],
            [
                'date' => '2022-09-05',
                'price' => 50,
                'train_id' => 3,
                'ticket_type_id' => 2
            ],
            [
                'date' => '1997-04-08',
                'price' => 100,
                'train_id' => 3,
                'ticket_type_id' => 1
            ]
        ]);
    }
}
