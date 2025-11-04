<?php

namespace domain\Type\Seeders;

use domain\Type\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{

    public function run(): void
    {
        $types = [
            [
                'name' => 'National',
            ],
            [
                'name' => 'Provincial',
            ],
            [
                'name' => 'Zonal',
            ],
            [
                'name' => 'School',
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
