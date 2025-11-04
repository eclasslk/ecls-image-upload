<?php

namespace domain\Subject\Seeders;

use domain\Level\Models\Level;
use domain\Subject\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{

    public function run(): void
    {
        $subjects = [
            [
                'name' => 'Physics',
                'level' => 'Advanced Level',
            ],
            [
                'name' => 'Chemistry',
                'level' => 'Advanced Level',
            ],
            [
                'name' => 'Biology',
                'level' => 'Advanced Level',
            ],
            [
                'name' => 'Maths',
                'level' => 'Ordinary Level',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create([
                'name' => $subject['name'],
                'level_id' => Level::where('name', $subject['level'])->first()->id,
            ]);
        }
    }
}
