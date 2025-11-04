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
        Schema::create('first_communions', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->unsignedTinyInteger('month');
            $table->unsignedTinyInteger('day');
            $table->json('names'); // Array of communicant names
            $table->json('parents'); // Array of parents names
            $table->string('address')->nullable();
            $table->string('minister')->nullable();
            $table->date('baptismal_date')->nullable();
            $table->string('baptismal_place')->nullable();
            $table->string('church_name')->default('SJDPP Church');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('first_communions');
    }
};
