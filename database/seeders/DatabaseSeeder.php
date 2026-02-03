<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\MemberSeeder;
use Database\Seeders\PositionSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\EventTypeSeeder;
use Database\Seeders\ExpenseTypeSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Richard Sombrio',
            'email' => 'richard.sombrio27@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Super Admin'
        ]);

        User::factory()->create([
            'name' => 'Leon Kennedy',
            'email' => 'leonkennedy@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Church head'
        ]);

        $this->call([
            ExpenseTypeSeeder::class,
            EventTypeSeeder::class,
            PositionSeeder::class,
            MemberSeeder::class,
        ]);
    }
}
