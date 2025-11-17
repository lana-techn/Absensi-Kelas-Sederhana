<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Model>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nis' => mt_rand(0000000, 9999999), // 10 angka acak
            'name' => fake()->name(), // Nama acak,
        ];
    }
}
