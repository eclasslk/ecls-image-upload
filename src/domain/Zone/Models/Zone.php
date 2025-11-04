<?php

namespace domain\Zone\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        'name',
        'province_id',
    ];
}
