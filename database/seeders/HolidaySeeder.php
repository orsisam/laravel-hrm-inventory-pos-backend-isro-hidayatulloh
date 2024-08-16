<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Holiday::insert([
            [
                'company_id' => 1,
                'name' => 'New Year',
                'year' => 2025,
                'month' => 1,
                'date' => '2025-01-01',
                'is_weekend' => 1,
                'created_by' => 1,
            ]
        ]);
    }
}
