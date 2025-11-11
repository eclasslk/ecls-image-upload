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
                'name' => 'Central',
                'code' => 'CP',
            ],
            [
                'name' => 'Eastern',
                'code' => 'EP',
            ],
            [
                'name' => 'North Central',
                'code' => 'NC',
            ],
            [
                'name' => 'North Western',
                'code' => 'NW',
            ],
            [
                'name' => 'Northern',
                'code' => 'NP',
            ],
            [
                'name' => 'Sabaragamuwa',
                'code' => 'SG',
            ],
            [
                'name' => 'Southern',
                'code' => 'SP',
            ],
            [
                'name' => 'Uva',
                'code' => 'UP',
            ],
            [
                'name' => 'Western',
                'code' => 'WP',
            ],


        ];

        foreach ($types as $type) {
            Province::create($type);
        }
    }
}
