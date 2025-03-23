<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdatet();
            $table->foreignId('jobad_id')->constrained('job_ads')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('cv');
            $table->text('coverLetter');
            $table->enum('status',['pending','received','withdrawed','accepted','refused','in_interview','done'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
