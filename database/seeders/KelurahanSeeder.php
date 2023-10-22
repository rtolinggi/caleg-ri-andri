<?php

namespace Database\Seeders;

use App\Models\DaftarPemilih;
use App\Models\PemungutanSuara;
use App\Models\Relawan;
use App\Models\RukunTetangga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KELURAHAN DI KEC. MUARA JAWA
        $muara_jawa = [
            'Dondang',
            'Muara Jawa Ilir',
            'Muara Jawa Pesisir',
            'Muara Jawa Tengah',
            'Muara Jawa Ulu',
            'Muara Kembang',
            'Tamapole',
            'Teluk Dalam'
        ];

        foreach ($muara_jawa as $data) {
            $idKecamatan = 1;
            $kelurahan = \App\Models\Kelurahan::create([
                'kecamatan_id' => $idKecamatan,
                'nama' => $data
            ]);

            $randomCount = rand(25, 40);

            RukunTetangga::factory($randomCount)
                ->has(
                    Relawan::factory()
                        ->count(1)
                        ->state(function (array $attributes, RukunTetangga $rukun_tetangga) {
                            return [
                                'rukun_tetangga_id' => $rukun_tetangga->id,
                                'kelurahan_id'      => $rukun_tetangga->kelurahan_id,
                                'kecamatan_id'      => $rukun_tetangga->kecamatan_id,
                            ];
                        })->has(
                            DaftarPemilih::factory()->count(rand(1, 20))
                                ->state(function (array $attributes, Relawan $relawan) {
                                    return [
                                        'relawan_id'        => $relawan->id,
                                        'rukun_tetangga_id' => $relawan->rukun_tetangga_id,
                                        'kelurahan_id'      => $relawan->kelurahan_id,
                                        'kecamatan_id'      => $relawan->kecamatan_id,
                                    ];
                                }),
                            'daftar_pemilihs'
                        ),
                    'relawans'
                )
                ->create([
                    'kecamatan_id' => $idKecamatan,
                    'kelurahan_id' => $kelurahan->id,
                ]);

            PemungutanSuara::factory($randomCount)->create([
                'kecamatan_id' => $idKecamatan,
                'kelurahan_id' => $kelurahan->id,
            ]);
        }

        // KELURAHAN DI KEC. SAMBOJA
        $samboja = [
            'Ambarawang Darat',
            'Ambarawang Laut',
            'Argosari',
            'Beringin Agung',
            'Bukit Merdeka',
            'Bukit Raya',
            'Handil Baru',
            'Handil Baru Darat',
            'Kampung Lama',
            'Karya Jaya',
            'Karya Merdeka',
            'Margomulyo',
            'Muara Sembilang',
            'Salok Api Darat',
            'Salok Api Laut',
            'Samboja Kuala',
            'Sanipah',
            'Sei Merdeka',
            'Sungai Seluang',
            'Tani Bakti',
            'Tanjung Harapan',
            'Teluk Pemedas',
            'Wonotirto',
        ];

        foreach ($samboja as $data) {
            $idKecamatan = 2;
            $kelurahan = \App\Models\Kelurahan::create([
                'kecamatan_id' => $idKecamatan,
                'nama' => $data
            ]);

            $randomCount = rand(25, 40);

            RukunTetangga::factory($randomCount)
                ->has(
                    Relawan::factory()
                        ->count(1)
                        ->state(function (array $attributes, RukunTetangga $rukun_tetangga) {
                            return [
                                'rukun_tetangga_id' => $rukun_tetangga->id,
                                'kelurahan_id'      => $rukun_tetangga->kelurahan_id,
                                'kecamatan_id'      => $rukun_tetangga->kecamatan_id,
                            ];
                        })->has(
                            DaftarPemilih::factory()->count(rand(1, 20))
                                ->state(function (array $attributes, Relawan $relawan) {
                                    return [
                                        'relawan_id'        => $relawan->id,
                                        'rukun_tetangga_id' => $relawan->rukun_tetangga_id,
                                        'kelurahan_id'      => $relawan->kelurahan_id,
                                        'kecamatan_id'      => $relawan->kecamatan_id,
                                    ];
                                }),
                            'daftar_pemilihs'
                        ),
                    'relawans'
                )
                ->create([
                    'kecamatan_id' => $idKecamatan,
                    'kelurahan_id' => $kelurahan->id,
                ]);

            PemungutanSuara::factory($randomCount)->create([
                'kecamatan_id' => $idKecamatan,
                'kelurahan_id' => $kelurahan->id,
            ]);
        }

        // KELURAHAN DI KEC. SANGA-SANGA
        $sanga_sanga = [
            'Jawa',
            'Pendingin',
            'Sanga-Sanga Dalam',
            'Sanga-Sanga Muara',
            'Sarijaya',
        ];

        foreach ($sanga_sanga as $data) {
            $idKecamatan = 3;
            $kelurahan = \App\Models\Kelurahan::create([
                'kecamatan_id' => $idKecamatan,
                'nama' => $data
            ]);

            $randomCount = rand(25, 40);

            RukunTetangga::factory($randomCount)
                ->has(
                    Relawan::factory()
                        ->count(1)
                        ->state(function (array $attributes, RukunTetangga $rukun_tetangga) {
                            return [
                                'rukun_tetangga_id' => $rukun_tetangga->id,
                                'kelurahan_id'      => $rukun_tetangga->kelurahan_id,
                                'kecamatan_id'      => $rukun_tetangga->kecamatan_id,
                            ];
                        })->has(
                            DaftarPemilih::factory()->count(rand(1, 20))
                                ->state(function (array $attributes, Relawan $relawan) {
                                    return [
                                        'relawan_id'        => $relawan->id,
                                        'rukun_tetangga_id' => $relawan->rukun_tetangga_id,
                                        'kelurahan_id'      => $relawan->kelurahan_id,
                                        'kecamatan_id'      => $relawan->kecamatan_id,
                                    ];
                                }),
                            'daftar_pemilihs'
                        ),
                    'relawans'
                )
                ->create([
                    'kecamatan_id' => $idKecamatan,
                    'kelurahan_id' => $kelurahan->id,
                ]);

            PemungutanSuara::factory($randomCount)->create([
                'kecamatan_id' => $idKecamatan,
                'kelurahan_id' => $kelurahan->id,
            ]);
        }
    }
}
