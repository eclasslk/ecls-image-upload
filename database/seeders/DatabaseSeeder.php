<?php

namespace Database\Seeders;

use App\Models\User;
use domain\Grade\Seeders\GradeSeeder;
use domain\Level\Seeders\LevelSeeder;
use domain\Medium\Seeders\MediumSeeder;
use domain\Paper\Seeders\PaperSeeder;
use domain\Province\Seeders\ProvinceSeeder;
use domain\School\Seeders\SchoolSeeder;
use domain\Subject\Seeders\SubjectSeeder;
use domain\Suffix\Seeders\SuffixSeeder;
use domain\Suffix\Seeders\SuffixTypeSeeder;
use domain\Syllabus\Seeders\SyllabusSeeder;
use domain\Term\Seeders\TermSeeder;
use domain\Type\Seeders\TypeSeeder;
use domain\Year\Seeders\YearSeeder;
use domain\Zone\Seeders\ZoneSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(MediumSeeder::class);
        $this->call(TermSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SyllabusSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(PaperSeeder::class);
        $this->call(SuffixTypeSeeder::class);
        $this->call(SuffixSeeder::class);
    }
}
