<?php

namespace Database\Seeders;

use App\Models\Guru;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Logkehadiran;
use Illuminate\Database\Seeder;
use Database\Seeders\GuruSeeder;
use Database\Seeders\KelasSeeder;
use Database\Seeders\SiswaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
        
        Kelas::factory(10)->create();
        Siswa::factory(100)->create();
        User::factory(100)->create();
    }
}

