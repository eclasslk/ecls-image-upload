<?php

namespace domain\Suffix\Seeders;

use domain\Paper\Models\Paper;
use domain\Suffix\Models\Suffix;
use domain\Suffix\Models\SuffixType;
use Illuminate\Database\Seeder;

class SuffixSeeder extends Seeder
{

    public function run(): void
    {
        $subjects = [
            [
                'paper_id' => 'test',
                'suffix_type_id' => 'inco',
            ],
            [
                'paper_id' => 'test',
                'suffix_type_id' => 'ocrf',
            ],
            [
                'paper_id' => 'test 1',
                'suffix_type_id' => 'inco',
            ],
            [
                'paper_id' => 'test',
                'suffix_type_id' => 'unid',
            ],
        ];

        foreach ($subjects as $subject) {
            Suffix::create([
                'paper_id' => Paper::where('name', $subject['paper_id'])->first()->id,
                'suffix_type_id' => SuffixType::where('name', $subject['suffix_type_id'])->first()->id,
            ]);
        }
    }
}
