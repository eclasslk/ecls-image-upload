<?php

namespace domain\Medium\Seeders;

use domain\Medium\Models\Medium;
use Illuminate\Database\Seeder;

class MediumSeeder extends Seeder
{
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Sinhala',
                'code' => 'SM',
            ],
            [
                'name' => 'Tamil',
                'code' => 'TM',
            ],
            [
                'name' => 'English',
                'code' => 'EM',
            ],

        ];

        foreach ($levels as $level) {
            Medium::create($level);
        }
    }
}
