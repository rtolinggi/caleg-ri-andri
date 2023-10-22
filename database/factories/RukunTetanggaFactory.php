<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RukunTetangga>
 */
class RukunTetanggaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kecamatan_id'   => 1,
            'kelurahan_id'   => 1,
            'nama'           => 'RT. ' . fake()->numberBetween(1, 40),
            'target_pemilih' => 20
        ];
    }
}
