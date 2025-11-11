<?php

namespace domain\Term\Seeders;

use domain\Term\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            [
                'name' => 'Term Test 1',
                'code' => ' TT1',
            ],
            [
                'name' => 'Term Test 2',
                'code' => 'TT2',
            ],
            [
                'name' => 'Term Test 3',
                'code' => 'TT3',
            ],
            [
                'name' => 'Pilot Test 1',
                'code' => 'PT1',
            ],
            [
                'name' => 'Pilot Test 2',
                'code' => 'PT2',
            ],
            [
                'name' => 'Pilot Test 3',
                'code' => 'PT3',
            ],

        ];

        foreach ($types as $type) {
            Term::create($type);
        }
    }
}
