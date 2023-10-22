<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'key' => 'Title_Website',
                'value' => 'Voter Management',
            ],
            [
                'key' => 'Tingkat',
                'value' => 'DPRD Kota Majuin',
            ],
            [
                'key' => 'Dapil',
                'value' => 'Kecamatan Sumber Sehat',
            ],
            [
                'key' => 'Copywriting',
                'value' => 'Percaya Pada Perubahan Majukan Kota',
            ],
            [
                'key' => 'Visi',
                'value' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus ipsum in, a nemo asperiores laboriosam! Nesciunt harum quod quidem, deleniti cupiditate reprehenderit esse dolorem, nostrum expedita rem maiores sed at aliquam repellendus facilis modi quae corporis, exercitationem veritatis magni accusamus similique nobis est! Eos quas possimus deserunt nesciunt quis dicta.',
            ],
            [
                'key' => 'Misi',
                'value' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Possimus ipsum in, a nemo asperiores laboriosam! Nesciunt harum quod quidem, deleniti cupiditate reprehenderit esse dolorem, nostrum expedita rem maiores sed at aliquam repellendus facilis modi quae corporis, exercitationem veritatis magni accusamus similique nobis est! Eos quas possimus deserunt nesciunt quis dicta.',
            ],
            [
                'key' => 'Facebook',
                'value' => '#',
            ],
            [
                'key' => 'Instagram',
                'value' => '#',
            ],
            [
                'key' => 'Youtube',
                'value' => '#',
            ],
            [
                'key' => 'No_Handphone',
                'value' => '081122334455',
            ],
            [
                'key' => 'Email',
                'value' => 'voteman@mail.com',
            ],
            [
                'key' => 'Alamat',
                'value' => 'Jalan Poros Sana No.01',
            ],
        ];

        foreach ($data as $item) {
            Setting::create([
                'key' => $item['key'],
                'value' => $item['value'],
            ]);
        }
    }
}
