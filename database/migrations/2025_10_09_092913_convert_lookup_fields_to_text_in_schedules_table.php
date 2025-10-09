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
            // Drop foreign key constraints first
            $table->dropForeign(['barangay_id']);
            $table->dropForeign(['chapel_id']);
            $table->dropForeign(['school_id']);

            // Drop the old ID columns
            $table->dropColumn(['barangay_id', 'chapel_id', 'school_id']);

            // Add new text columns in their place
            $table->string('barangay_name')->nullable()->after('address');
            $table->string('chapel_name')->nullable()->after('mass_category');
            $table->string('school_name')->nullable()->after('transport_needed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Drop text columns
            $table->dropColumn(['barangay_name', 'chapel_name', 'school_name']);

            // Re-add the foreign key columns
            $table->foreignId('barangay_id')->nullable()->constrained()->nullOnDelete()->after('address');
            $table->foreignId('chapel_id')->nullable()->constrained()->nullOnDelete()->after('mass_category');
            $table->foreignId('school_id')->nullable()->constrained()->nullOnDelete()->after('transport_needed');
        });
    }
};
