<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator User',
            'email' => 'admin@admin.com',
        ]);

        $this->call([SettingSeeder::class]);
        $this->call([RiwayatHidupSeeder::class]);
        $this->call([MediaSeeder::class]);
        // $this->call([KecamatanSeeder::class]);
        // $this->call([KelurahanSeeder::class]);
    }
}
