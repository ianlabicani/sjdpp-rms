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
        Schema::create('schedule_school_masses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();
            $table->foreignId('school_id')->constrained();
            $table->string('campus_or_venue')->nullable();
            $table->string('grade_levels')->nullable();
            $table->integer('expected_students')->nullable();
            $table->integer('expected_faculty')->nullable();
            $table->time('assembly_time')->nullable();
            $table->string('security_clearance_ref')->nullable();
            $table->enum('communion_policy', ['allow', 'restrict', 'none'])->default('allow');
            $table->text('intention_summary')->nullable();
            $table->integer('ministers_needed')->default(0);
            $table->string('readings_cycle')->nullable();
            $table->string('liturgical_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_school_masses');
    }
};
