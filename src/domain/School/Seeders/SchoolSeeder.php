<?php

namespace domain\School\Seeders;

use App\Models\User;
use domain\Province\Models\Province;
use domain\School\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $schools = [
            [
                'name' => 'Royal C. colombo',
                'province' => 'Western',
            ],
            [
                'name' => 'Vishaka C. colombo',
                'province' => 'Western',
            ],
            [
                'name' => 'Bandaranayake C. gampaha',
                'province' => 'Western',
            ],
            [
                'name' => 'Anuradhapuara C. anuradhapura',
                'province' => 'Central',
            ],
            [
                'name' => 'Kakirawa C. anuradhapura',
                'province' => 'Central',
            ],

        ];

        foreach ($schools as $school) {
            School::create([
                'name' => $school['name'],
                'province_id' => Province::where('name', $school['province'])->first()->id,
                'updated_by' => User::where('name', 'User')->first()->id,
            ]);
        }
    }
}
