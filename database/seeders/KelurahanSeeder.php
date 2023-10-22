<?php

namespace Database\Seeders;

use App\Models\DaftarPemilih;
use App\Models\Kelurahan;
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

        $csvFile = fopen(database_path('data/kelurahan.csv'), 'r');
        $firstline = true;

        while (($data = fgetcsv($csvFile, 255, ",")) !== FALSE) {
            if (!$firstline) {
                $id = isset($data[0]) ? $data[0] : null;
                $kabupaten = isset($data[2]) ? $data[2] : null;
                $kecamatan = isset($data[1]) ? $data[1] : null;
                $nama = isset($data[3]) ? $data[3] : null;
                $target = isset($data[4]) ? $data[4] : null;
                if ($id && $nama && $kabupaten && $nama) {
                    Kelurahan::create([
                        "id" => $id,
                        "kabupaten_id" => $kabupaten,
                        "kecamatan_id" => $kecamatan,
                        "nama" => $nama,
                        "target_pemilih" => $target,
                    ]);
                }
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
