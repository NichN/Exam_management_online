<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Keo SovangLogdy',
            'email' => 'logdy123@gmail.com',
            'password' =>Hash::make('2022'),
            'role' => 'student',
        ]);
        User::create([
            'name' => 'Ny SreyNich',
            'email' => 'nich546@gmail.com',
            'password' =>Hash::make('2023'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Keo Lakena',
            'email' => 'teacher@gmail.com',
            'password' =>Hash::make('2024'),
            'role' => 'teacher'
        ]);
    }
}
