<?php

namespace domain\Level\Seeders;

use domain\Level\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{

    public function run(): void
    {
        $levels = [
            [
                'name' => 'Advanced Level',
                'code' => 'AL',
            ],
            [
                'name' => 'Ordinary Level',
                'code' => 'OL',
            ],
            [
                'name' => 'Primary',
                'code' => 'Pri',
            ],

        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
