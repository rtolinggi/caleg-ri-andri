<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarPemilih>
 */
class DaftarPemilihFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik'                 => fake()->nik(),
            'nama'                => fake()->name(),
            'no_hp'               => fake()->e164PhoneNumber(),
            'umur'                => rand(17, 90),
            'jenis_kelamin'       => fake()->randomElement(['PRIA', 'WANITA']),
            'file_identitas'      => null,
            'is_calon'            => fake()->boolean(),
            'relawan_id'          => 1,
            'pemungutan_suara_id' => null,
            'rukun_tetangga_id'   => 1,
            'kelurahan_id'        => 1,
            'kecamatan_id'        => 1,
        ];
    }
}
