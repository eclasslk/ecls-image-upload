<?php

namespace domain\Paper\Models;

use App\Models\User;
use domain\Level\Models\Level;
use domain\Medium\Models\Medium;
use domain\Province\Models\Province;
use domain\School\Models\School;
use domain\Subject\Models\Subject;
use domain\Type\Models\Type;
use domain\Zone\Models\Zone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i a',
        'updated_at' => 'date:Y-m-d H:i a',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class,'type_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class,'province_id');
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(Zone::class,'zone_id');
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class,'school_id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class,'level_id');
    }

    public function medium(): BelongsTo
    {
        return $this->belongsTo(Medium::class,'medium_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class,'updated_by');
    }


}
