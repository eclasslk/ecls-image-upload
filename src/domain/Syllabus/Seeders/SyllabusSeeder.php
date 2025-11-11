<?php

namespace domain\Syllabus\Seeders;

use domain\Syllabus\Models\Syllabus;
use Illuminate\Database\Seeder;

class SyllabusSeeder extends Seeder
{
    public function run(): void
    {
        $syllabuses = [
            [
                'name' => 'Old Syllabus',
                'code' => ' OS',
            ],
            [
                'name' => 'New Syllabus',
                'code' => 'NS',
            ],

        ];

        foreach ($syllabuses as $syllabus) {
            Syllabus::create($syllabus);
        }
    }
}
