<?php

namespace domain\Zone\Seeders;

use domain\Province\Models\Province;
use domain\Zone\Models\Zone;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{

    public function run(): void
    {
        $zones = [
            [
                'name' => 'Kelaniya',
                'province' => 'Western',
            ],
            [
                'name' => 'Gampaha',
                'province' => 'Western',
            ],
            [
                'name' => 'Anuradhapura',
                'province' => 'Central',
            ],
            [
                'name' => 'Kuliyapitiya',
                'province' => 'Central',
            ],
        ];

        foreach ($zones as $zone) {
            Zone::create([
                'name' => $zone['name'],
                'province_id' => Province::where('name', $zone['province'])->first()->id,
            ]);
        }
    }
}
