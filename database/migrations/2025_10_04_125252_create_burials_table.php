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
        Schema::create('burials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_of_death');
            $table->date('date_of_burial');
            $table->integer('age');
            $table->string('status');
            $table->string('informant');
            $table->string('place');
            $table->string('presider');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('burials');
    }
};
