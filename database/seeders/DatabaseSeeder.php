<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Students::factory(50)->create();

        \App\Models\User::factory()->create([
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'role' => '1',
        ]);
    }
}
