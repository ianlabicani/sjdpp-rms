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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->enum('sacrament_type', ['baptismal', 'burial', 'confirmation', 'wedding']);
            $table->string('client_name');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->date('schedule_date');
            $table->time('schedule_time');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'approved', 'declined', 'completed', 'cancelled'])->default('pending');
            $table->text('priest_notes')->nullable()->nullable();
            $table->timestamp('priest_reviewed_at')->nullable();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Secretary who created it
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
