<?php

namespace domain\Year\Seeders;

use domain\Year\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{

    public function run(): void
    {
        $years = [];

        for ($year = 1981; $year <= 2025; $year++) {
            $years[] = ['year' => $year];
        }

        foreach ($years as $year) {
            Year::create($year);
        }
    }
}
