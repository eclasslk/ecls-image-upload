<?php

namespace domain\Suffix\Seeders;

use domain\Suffix\Models\SuffixType;
use Illuminate\Database\Seeder;

class SuffixTypeSeeder extends Seeder
{

    public function run(): void
    {
        $suffixes = [
            [
                'name' => 'inco',
            ],
            [
                'name' => 'ocrf',
            ],
            [
                'name' => 'unid',
            ],

        ];

        foreach ($suffixes as $suffix) {
            SuffixType::create($suffix);
        }
    }
}
