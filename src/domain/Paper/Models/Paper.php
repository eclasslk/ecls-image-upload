<?php

namespace domain\Paper\Models;

use App\Models\User;
use domain\Grade\Models\Grade;
use domain\Level\Models\Level;
use domain\Medium\Models\Medium;
use domain\Province\Models\Province;
use domain\School\Models\School;
use domain\Subject\Models\Subject;
use domain\Suffix\Models\Suffix;
use domain\Suffix\Models\SuffixType;
use domain\Syllabus\Models\Syllabus;
use domain\Term\Models\Term;
use domain\Type\Models\Type;
use domain\Year\Models\Year;
use domain\Zone\Models\Zone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Paper extends Model
{
    protected $fillable = [
        'year_id',
        'grade_id',
        'term_id',
        'syllabus_id',
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

    public function year(): BelongsTo
    {
        return $this->belongsTo(Year::class,'year_id');
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function term(): BelongsTo
    {
        return $this->belongsTo(Term::class,'term_id');
    }

    public function syllabus(): BelongsTo
    {
        return $this->belongsTo(Syllabus::class,'syllabus_id');
    }

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

    public function suffixes(): BelongsToMany
    {
        return $this->belongsToMany(
            SuffixType::class,        // related model
            'suffixes',    // pivot table name
            'paper_id',
            'suffix_type_id'
        );
    }
}
