<?php

namespace domain\Grade\Seeders;

use domain\Grade\Models\Grade;
use domain\Level\Models\Level;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{

    public function run(): void
    {
        $grades = [
            [
                'grade' => 'G13',
                'level' => 'Advanced Level',
            ],
            [
                'grade' => 'G12',
                'level' => 'Advanced Level',
            ],
            [
                'grade' => 'G11',
                'level' => 'Ordinary Level',
            ],
            [
                'grade' => 'G10',
                'level' => 'Ordinary Level',
            ],
            [
                'grade' => 'G9',
                'level' => 'Ordinary Level',
            ],
            [
                'grade' => 'G8',
                'level' => 'Ordinary Level',
            ],
            [
                'grade' => 'G7',
                'level' => 'Ordinary Level',
            ],
            [
                'grade' => 'G6',
                'level' => 'Ordinary Level',
            ],
            [
                'grade' => 'G5',
                'level' => 'Primary',
            ],
            [
                'grade' => 'G4',
                'level' => 'Primary',
            ],
            [
                'grade' => 'G3',
                'level' => 'Primary',
            ],
            [
                'grade' => 'G2',
                'level' => 'Primary',
            ],
            [
                'grade' => 'G1',
                'level' => 'Primary',
            ],

        ];

        foreach ($grades as $grade) {
            Grade::create([
                'grade' => $grade['grade'],
                'level_id' => Level::where('name', $grade['level'])->first()->id,
            ]);        }
    }
}
