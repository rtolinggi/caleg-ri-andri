<?php

namespace Database\Seeders;

use App\Models\RiwayatHidup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiwayatHidupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'Nama_Lengkap',
                'value' => 'James Clear Folking, S.IP., MH.',
            ],
            [
                'key' => 'Kelahiran',
                'value' => 'Rahim, 15 Mei 1994',
            ],
            [
                'key' => 'Jenis_Kelamin',
                'value' => 'Laki-Laki',
            ],
            [
                'key' => 'Status',
                'value' => 'Menikah',
            ],
            [
                'key' => 'Kewarganegaraan',
                'value' => 'Indonesia',
            ],
            [
                'key' => 'Suku',
                'value' => 'Asgard',
            ],
            [
                'key' => 'Hobi',
                'value' => 'Sepak Bola',
            ],
        ];

        foreach ($data as $item) {
            RiwayatHidup::create([
                'key' => $item['key'],
                'value' => $item['value'],
            ]);
        }
    }
}
