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
        Schema::create('confirmations', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->date('date_of_confirmation');
            $table->string('name');
            $table->string('parish_of_baptism');
            $table->string('province_of_baptism');
            $table->string('place_of_baptism');
            $table->string('parents');
            $table->string('sponsor');
            $table->string('name_of_minister');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirmations');
    }
};
