<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(database_path('data/kecamatan.csv'), 'r');
        $firstline = true;

        while (($data = fgetcsv($csvFile, 255, ",")) !== FALSE) {
            if (!$firstline) {
                $id = isset($data[0]) ? $data[0] : null;
                $kabupaten = isset($data[1]) ? $data[1] : null;
                $nama = isset($data[2]) ? $data[2] : null;
                $created_at = isset($data[3]) ? $data[3] : null;
                $updated_at = isset($data[4]) ? $data[4] : null;

                if ($id && $nama && $kabupaten) {
                    Kecamatan::create([
                        "id" => $id,
                        "kabupaten_id" => $kabupaten,
                        "nama" => $nama,
                        "created_at" => $created_at,
                        "updated_at" => $updated_at,
                    ]);
                }
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}
