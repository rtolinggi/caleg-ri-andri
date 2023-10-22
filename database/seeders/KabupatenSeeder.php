<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(database_path('data/kabupaten.csv'), 'r');
        $firstline = true;

        while (($data = fgetcsv($csvFile, 255, ",")) !== FALSE) {
            if (!$firstline) {
                $id = isset($data[0]) ? $data[0] : null;
                $nama = isset($data[1]) ? $data[1] : null;
                $created_at = isset($data[2]) ? $data[2] : null;
                $updated_at = isset($data[3]) ? $data[2] : null;

                if ($id && $nama && $created_at && $updated_at) {
                    Kabupaten::create([
                        "id" => $id,
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
