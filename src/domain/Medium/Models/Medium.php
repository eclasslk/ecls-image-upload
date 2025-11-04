<?php

namespace domain\Medium\Models;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $table = 'mediums';
    protected $fillable = [
        'name',
        'code',
    ];
}
