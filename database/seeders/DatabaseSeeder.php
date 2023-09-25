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
        //Seed DB with two flights

         \App\Models\FLight::factory()->create([
                'startX' => -0.18578166984152553,
                'startY' => 51.15573577417759,
                'endX' => -0.33180561406680537,
                'endY' => 51.234428399919196,
                'speed' => 0.9
         ]);

        \App\Models\FLight::factory()->create([
            'startX' => -0.18578166984152553,
            'startY' => 51.1,
            'endX' => -0.16815974596153746,
            'endY' => 51.235971822243734,
            'speed' => 0.2
        ]);
    }
}
