<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
        ['email' => 'pueng9342@gmail.com'],
        [
            'name' => 'Admin User',
            'student_id' => 'ADMIN',
            'password' => \Illuminate\Support\Facades\Hash::make('123'),
            'role' => 'admin',
        ]
        );
    }
}
