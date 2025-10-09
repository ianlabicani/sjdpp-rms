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
        Schema::create('schedule_blessings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();
            $table->enum('blessing_type', ['house', 'store', 'office', 'vehicle', 'image', 'other']);
            $table->string('owner_name');
            $table->text('address');
            $table->foreignId('barangay_id')->nullable()->constrained();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('zip_code')->nullable();
            $table->integer('occupants_count')->nullable();
            $table->text('items_prepared')->nullable();
            $table->text('access_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_blessings');
    }
};
