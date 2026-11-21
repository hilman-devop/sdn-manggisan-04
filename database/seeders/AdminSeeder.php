<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Operator SDN 04 Manggisan',
            'email' => 'sdn04manggisan@admin.com',
            'password' => Hash::make('admin321'),
        ]);
    }
} 