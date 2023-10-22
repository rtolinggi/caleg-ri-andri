<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Muara Jawa', 'Samboja', 'Sanga-Sanga'
        ];

        foreach ($data as $item) {
            \App\Models\Kecamatan::create(['nama' => $item]);
        }
    }
}
