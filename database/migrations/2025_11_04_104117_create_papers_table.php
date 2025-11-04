<?php

use App\Models\User;
use domain\Level\Models\Level;
use domain\Medium\Models\Medium;
use domain\Province\Models\Province;
use domain\School\Models\School;
use domain\Subject\Models\Subject;
use domain\Type\Models\Type;
use domain\Zone\Models\Zone;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->enum('grade',[12,13]);
            $table->string('term')->nullable();
            $table->string('syllabus')->nullable();
            $table->integer('question_count')->nullable();
            $table->string('name');
            $table->string('file_path')->nullable();
            $table->foreignIdFor(Type::class, 'type_id')->constrained('types')->restrictOnDelete();
            $table->foreignIdFor(Province::class, 'province_id')->constrained('provinces')->restrictOnDelete();
            $table->foreignIdFor(Zone::class, 'zone_id')->constrained('zones')->restrictOnDelete();
            $table->foreignIdFor(School::class, 'school_id')->constrained('schools')->restrictOnDelete();
            $table->foreignIdFor(Level::class, 'level_id')->constrained('levels')->restrictOnDelete();
            $table->foreignIdFor(Medium::class, 'medium_id')->constrained('mediums')->restrictOnDelete();
            $table->foreignIdFor(Subject::class, 'subject_id')->constrained('subjects')->restrictOnDelete();
            $table->foreignIdFor(User::class, 'updated_by')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('papers');
    }
};
