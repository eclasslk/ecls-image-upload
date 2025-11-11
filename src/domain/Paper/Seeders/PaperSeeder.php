<?php

namespace domain\Paper\Seeders;

use App\Models\User;
use domain\Grade\Models\Grade;
use domain\Level\Models\Level;
use domain\Medium\Models\Medium;
use domain\Paper\Models\Paper;
use domain\Province\Models\Province;
use domain\School\Models\School;
use domain\Subject\Models\Subject;
use domain\Syllabus\Models\Syllabus;
use domain\Term\Models\Term;
use domain\Type\Models\Type;
use domain\Year\Models\Year;
use domain\Zone\Models\Zone;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
{

    public function run(): void
    {
        $papers = [
            [
                'year' => 2020,
                'grade' => '12',
                'term' => 'Term Test 1',
                'syllabus' => 'New Syllabus',
                'name' => 'test',
                'file_path' => 'test',
                'type_id' => 'National',
                'province_id' => 'Central',
                'zone_id' => 'Kuliyapitiya',
                'school_id' => 'Royal College',
                'level_id' => 'Advanced Level',
                'medium_id' => 'Sinhala',
                'subject_id' => 'Biology',
                'updated_by' => 'User',
            ],
            [
                'year' => 2021,
                'grade' => '13',
                'term' => 'Term Test 2',
                'syllabus' => 'Old Syllabus',
                'name' => 'test 1',
                'file_path' => 'test 1',
                'type_id' => 'National',
                'province_id' => 'Western',
                'zone_id' => 'Gampaha',
                'school_id' => 'Bandaranayake College',
                'level_id' => 'Ordinary Level',
                'medium_id' => 'English',
                'subject_id' => 'Biology',
                'updated_by' => 'User',
            ],

        ];

        foreach ($papers as $paper) {
            Paper::create([
                'year_id' => Year::where('year', $paper['year'])->first()->id,
                'grade_id' => Grade::where('grade', $paper['grade'])->first()->id,
                'term_id' => Term::where('name', $paper['term'])->first()->id,
                'syllabus_id' => Syllabus::where('name', $paper['syllabus'])->first()->id,
                'name' => $paper['name'],
                'file_path' => $paper['file_path'],
                'type_id' => Type::where('name', $paper['type_id'])->first()->id,
                'province_id' => Province::where('name', $paper['province_id'])->first()->id,
                'zone_id' => Zone::where('name', $paper['zone_id'])->first()->id,
                'school_id' => School::where('name', $paper['school_id'])->first()->id,
                'level_id' => Level::where('name', $paper['level_id'])->first()->id,
                'medium_id' => Medium::where('name', $paper['medium_id'])->first()->id,
                'subject_id' => Subject::where('name', $paper['subject_id'])->first()->id,
                'updated_by' => User::where('name', $paper['updated_by'])->first()->id,
            ]);
        }
    }


}
