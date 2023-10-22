<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PemungutanSuara>
 */
class PemungutanSuaraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kecamatan_id' => 1,
            'kelurahan_id' => 1,
            'nama'         => 'TPS. ' . fake()->numberBetween(1, 40),
            'jumlah_suara' => rand(5, 15),
            'file_bukti'   => null,
            'is_lock'      => false,
        ];
    }
}
