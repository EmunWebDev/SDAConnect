<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event_types')->insert([

            ['name' => 'Church Anniversary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Baptism Ceremony', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Youth and Ministry', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Outreach and Evangelism', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Trainings and Seminars', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pathfinder and Masterguide', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Social and Family', 'created_at' => now(), 'updated_at' => now()],


        ]);
    }
}
