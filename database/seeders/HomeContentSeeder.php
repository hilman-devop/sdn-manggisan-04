<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomeContent;

class HomeContentSeeder extends Seeder
{
    public function run(): void
    {
        HomeContent::create([
            'title' => 'Selamat Datang di Website Sekolah',
            'description' => 'Kami adalah lembaga pendidikan yang berkomitmen untuk memberikan pendidikan berkualitas dan membentuk generasi yang unggul.',
            'image' => null,
        ]);
    }
} 