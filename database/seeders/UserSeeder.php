<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Professore',
            'email' => 'prof@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}