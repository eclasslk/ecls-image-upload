<?php

namespace domain\Subject\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'level_id',
    ];
}
