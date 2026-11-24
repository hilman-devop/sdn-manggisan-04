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
                'name' => 'Guru Contoh 1',
                'position' => 'Kepala Sekolah',
                'photo' => null,
            ],
            [
                'name' => 'Guru Contoh 2',
                'position' => 'Guru Kelas 1',
                'photo' => null,
            ],
            [
                'name' => 'Guru Contoh 3',
                'position' => 'Guru Kelas 2',
                'photo' => null,
            ],
        ]);
    }
}
