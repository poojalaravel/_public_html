<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\User::create([
        //     'name' => 'Web Journey',
        //     'email' => 'webjourney@gmail.com',
        //     'username' => 'webjourney',
        //     'password' => Hash::make('12345678'),
        // ]);

        \App\Models\User::create([
            'name' => 'Rajeev',
            'email' => 'rajeev@gmail.com',
            'admin_type' => 1,
            'password' => Hash::make('12345678'),
        ]);
    }
}
