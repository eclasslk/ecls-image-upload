<?php

use App\Models\User;
use domain\Province\Models\Province;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignIdFor(Province::class, 'province_id')->constrained('provinces')->restrictOnDelete();
            $table->foreignIdFor(User::class, 'updated_by')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
