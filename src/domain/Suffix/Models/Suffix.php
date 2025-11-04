<?php

namespace domain\Suffix\Models;

use Illuminate\Database\Eloquent\Model;

class Suffix extends Model
{
    protected $fillable = [
        'paper_id',
        'suffix_type_id',
    ];
}
