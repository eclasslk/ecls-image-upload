<?php

use domain\Paper\Models\Paper;
use domain\Suffix\Models\SuffixType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('suffixes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Paper::class, 'paper_id')->constrained('papers')->cascadeOnDelete();
            $table->foreignIdFor(SuffixType::class, 'suffix_type_id')->constrained('suffix_types')->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('suffixes');
    }
};
