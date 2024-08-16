<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'Artisan LLC',
            'email' => 'cs@artisan.com',
            'phone' => fake()->phoneNumber,
            'website' => 'artisan.com',
            'logo' => fake()->imageUrl(width: 64, height: 64),
            'address' => fake()->address,
            'status' => 'active',
            'total_users' => 100,
            'clock_in_time' => '09:00:00',
            'clock_out_time' => '18:00:00',
            'early_clock_in_time' => 15,
            'allow_clock_out_till' => 15,
            'self_clocking' => true,
        ]);
    }
}
