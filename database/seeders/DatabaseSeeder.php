<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            HomeContentSeeder::class,
        ]);
        Teacher::truncate();
        Teacher::insert([
            [
                'name' => 'Budi Santoso',
                'position' => 'Kepala Sekolah',
                'photo' => null,
            ],
            [
                'name' => 'Siti Aminah',
                'position' => 'Guru Kelas 1',
                'photo' => null,
            ],
            [
                'name' => 'Ahmad Fadhil',
                'position' => 'Guru Kelas 2',
                'photo' => null,
            ],
        ]);
    }
}
