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
                'grade' => '12',
            ],
            [
                'grade' => '13',
            ],

        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}
