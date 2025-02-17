<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'phone' => '1234567890',
                'role_id' => 1, // Admin
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Employee User',
                'email' => 'employee@example.com',
                'phone' => '9876543210',
                'role_id' => 2, // Employee
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'phone' => '1122334455',
                'role_id' => 3, // Client
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
