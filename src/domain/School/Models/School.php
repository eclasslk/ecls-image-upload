<?php

namespace domain\School\Models;

use domain\Province\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
{
    protected $fillable = [
        'name',
        'province_id',
        'updated_by',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}
