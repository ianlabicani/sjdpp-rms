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
        Schema::create('baptismals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date');
            $table->date('baptism_date');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('church_name');
            $table->string('sponsor');
            $table->string('secondary_sponsor')->nullable();
            $table->string('priest_name');
            $table->integer('book_number');
            $table->integer('page_number');
            $table->integer('line_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptismals');
    }
};
