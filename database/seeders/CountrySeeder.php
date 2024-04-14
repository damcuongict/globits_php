<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::create([
            'code' => 'VN',
            'name' => 'Việt Nam',
            'description' => 'Đất nước Việt Nam xinh đẹp',
        ]);

        Country::create([
            'code' => 'US',
            'name' => 'United States',
            'description' => 'The United States of America',
        ]);

        Country::create([
            'code' => 'CA',
            'name' => 'Canada',
            'description' => 'The Dominion of Canada',
        ]);

        Country::create([
            'code' => 'JP',
            'name' => 'Japan',
            'description' => 'The Land of the Rising Sun',
        ]);
    }
}
