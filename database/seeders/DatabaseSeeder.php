<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default Admin User
        User::query()->create([
            'name' => 'Cogear Admin',
            'email' => 'admin@cogear.agency',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $this->call([
            ServiceSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
