<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('expense_types')->insert([

            ['name' => 'Church Operations', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Facilities and Maintenance', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ministries and Departments', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Community and Outreach', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Financial and Administrative', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Staff and Personnel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Events and Programs', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Health and Welfare', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Miscellaneous', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
