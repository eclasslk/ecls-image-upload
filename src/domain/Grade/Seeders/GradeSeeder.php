<?php

namespace domain\Grade\Seeders;

use domain\Grade\Models\Grade;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{

    public function run(): void
    {
        $grades = [
            [
                'grade' => 'G12',
            ],
            [
                'grade' => 'G13',
            ],

        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
