<?php

namespace Database\Seeders;

use App\Models\User;
use domain\Level\Seeders\LevelSeeder;
use domain\Medium\Seeders\MediumSeeder;
use domain\Paper\Seeders\PaperSeeder;
use domain\Province\Seeders\ProvinceSeeder;
use domain\School\Seeders\SchoolSeeder;
use domain\Subject\Seeders\SubjectSeeder;
use domain\Type\Seeders\TypeSeeder;
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
        $this->call(PaperSeeder::class);
    }
}
