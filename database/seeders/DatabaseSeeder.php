<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jefferson Silva',
            'email' => 'jefferson@email.com',
            'password' => '$2y$12$9FXeWf3T/FYXx0.6z0Q64udlkTt7uR.uowo3RT9u.3fyrDXZqWqje',
        ]);
    }
}
