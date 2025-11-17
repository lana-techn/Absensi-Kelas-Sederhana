<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bangku = rand(00,40);
        return [
            'name'=>rand(00,12).Str::random(1),
            'bangku_tersisa'=>$bangku,
            'rombel'=>$bangku,
        ];
    }
}
