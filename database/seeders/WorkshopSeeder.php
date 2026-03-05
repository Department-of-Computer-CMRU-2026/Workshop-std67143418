<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Workshop::create([
            'title' => 'Introduction to Laravel',
            'speaker' => 'John Doe',
            'description' => 'Learn the basics of the most popular PHP framework.',
            'capacity' => 20,
            'scheduled_at' => now()->addDays(7),
        ]);

        \App\Models\Workshop::create([
            'title' => 'Advanced CSS with Tailwind',
            'speaker' => 'Jane Smith',
            'description' => 'Master Tailwind CSS and build beautiful interfaces.',
            'capacity' => 15,
            'scheduled_at' => now()->addDays(10),
        ]);

        \App\Models\Workshop::create([
            'title' => 'Docker for Beginners',
            'speaker' => 'Michael Brown',
            'description' => 'Containerize your applications with ease.',
            'capacity' => 10,
            'scheduled_at' => now()->addDays(14),
        ]);
    }
}
