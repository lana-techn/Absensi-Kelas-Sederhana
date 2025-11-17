<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User test 1
        User::create([
            'nip' => '12345678',
            'name' => 'Admin Test',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // User test 2
        User::create([
            'nip' => '87654321',
            'name' => 'Guru Test',
            'username' => 'guru',
            'password' => Hash::make('guru123'),
        ]);

        // User test 3
        User::create([
            'nip' => '11223344',
            'name' => 'Devi Test',
            'username' => 'devi34',
            'password' => Hash::make('devi123'),
        ]);
    }
}
