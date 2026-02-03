<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->insert([

            ['name' => 'Church Pastor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Head Elder', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Elder', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Secretary', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Clerk', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assistant Clerk', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Treasurer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Assistant Treasurer', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Auditor', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Head Deacon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Deacon', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
