<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Admin User
        \App\Models\User::factory()->create([
            'name' => 'Cogear Admin',
            'email' => 'admin@cogear.agency',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
