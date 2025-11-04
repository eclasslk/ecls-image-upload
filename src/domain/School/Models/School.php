<?php

namespace domain\School\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
        'city',
        'province_id',
    ];
}
