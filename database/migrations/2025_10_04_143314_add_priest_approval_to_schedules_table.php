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
        Schema::table('schedules', function (Blueprint $table) {
            $table->enum('priest_status', ['pending', 'approved', 'declined'])->default('pending')->after('status');
            $table->text('priest_notes')->nullable()->after('priest_status');
            $table->timestamp('priest_reviewed_at')->nullable()->after('priest_notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropColumn(['priest_status', 'priest_notes', 'priest_reviewed_at']);
        });
    }
};
