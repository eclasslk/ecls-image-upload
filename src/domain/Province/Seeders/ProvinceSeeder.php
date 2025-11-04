<?php

namespace domain\Province\Seeders;

use domain\Province\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{

    public function run(): void
    {
        $types = [
            [
                'name' => 'Western',
                'code' => 'WP',
            ],
            [
                'name' => 'Central',
                'code' => 'CP',
            ],

        ];

        foreach ($types as $type) {
            Province::create($type);
        }
    }
}
