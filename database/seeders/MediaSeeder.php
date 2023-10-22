<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Logo Web',
                'image' => null,
            ],
            [
                'title' => 'Avatar Image',
                'image' => null,
            ],
            [
                'title' => 'Banner Image',
                'image' => null,
            ],
        ];

        foreach ($data as $item) {
            Media::create([
                'title' => $item['title'],
                'image' => $item['image'],
            ]);
        }
    }
}
