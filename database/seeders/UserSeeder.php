<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        //create admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mcq.com',
            'password' => Hash::make('12'),
            'role' => 'admin',
        ]);

        // create user
        User::create([
            'name' => 'User',
            'email' => 'user@mcq.com',
            'password' => Hash::make('12'),
            'role' => 'user',
        ]);
    }
}
