<?php

namespace domain\Syllabus\Models;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table = 'syllabuses';

    protected $fillable = [
        'name',
        'code',
    ];
}
