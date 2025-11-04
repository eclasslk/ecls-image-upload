<?php

namespace domain\Paper\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $fillable = [
        'year',
        'grade',
        'term',
        'syllabus',
        'question_count',
        'name',
        'file_path',
        'type_id',
        'province_id',
        'zone_id',
        'school_id',
        'level_id',
        'medium_id',
        'subject_id',
        'updated_by',
    ];
}
