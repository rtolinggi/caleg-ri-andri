<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Relawan>
 */
class RelawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik'               => fake()->nik(),
            'nama'              => fake()->name(),
            'phone'             => fake()->e164PhoneNumber(),
            'jenjang'           => 'RT',
            'tipe'              => 'Inti',
            'file_identitas'    => null,
            'rukun_tetangga_id' => 1,
            'kelurahan_id'      => 1,
            'kecamatan_id'      => 1,
        ];
    }
}
