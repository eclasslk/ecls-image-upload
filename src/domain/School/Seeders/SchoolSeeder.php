<?php

namespace domain\School\Seeders;

use domain\Province\Models\Province;
use domain\School\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Royal College',
                'city' => 'colombo',
                'province' => 'Western',
            ],
            [
                'name' => 'Vishaka College',
                'city' => 'colombo',
                'province' => 'Western',
            ],
            [
                'name' => 'Bandaranayake College',
                'city' => 'gampha',
                'province' => 'Western',
            ],
            [
                'name' => 'Anuradhapuara College',
                'city' => 'anuradhapura',
                'province' => 'Central',
            ],
            [
                'name' => 'Kakirawa College',
                'city' => 'anuradhapura',
                'province' => 'Central',
            ],

        ];

        foreach ($schools as $school) {
            School::create([
                'name' => $school['name'],
                'city' => $school['city'],
                'province_id' => Province::where('name', $school['province'])->first()->id,
            ]);
        }
    }
}
