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
        Schema::create('schedule_masses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();
            $table->enum('mass_category', ['sunday', 'weekday', 'holy_day', 'special_occasion', 'memorial', 'other']);
            $table->foreignId('chapel_id')->nullable()->constrained();
            $table->text('intention_summary')->nullable();
            $table->integer('ministers_needed')->default(0);
            $table->string('choir_team')->nullable();
            $table->enum('recurrence', ['none', 'weekly', 'monthly'])->default('none');
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
        Schema::dropIfExists('schedule_masses');
    }
};
