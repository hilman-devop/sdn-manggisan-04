<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $password = env('ADMIN_SEED_PASSWORD');
        if (!$password) {
            throw new \RuntimeException('Set ADMIN_SEED_PASSWORD in .env before seeding the admin account.');
        }

        User::create([
            'name' => 'Operator Sekolah',
            'email' => 'operator@example.com',
            'password' => Hash::make($password),
        ]);
    }
} 