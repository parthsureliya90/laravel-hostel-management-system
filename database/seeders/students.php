<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class students extends Seeder
{
    public function definition(): array
    {
        return [
            'photo' => Str::random(10),
            'fname' => Str::random(10),
            'mname' => Str::random(10),
            'lname' => Str::random(10),
            'city' => Str::random(10),
            'state' => Str::random(10),
            'country' => Str::random(10),
            'course' => Str::random(10),
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    }
}
