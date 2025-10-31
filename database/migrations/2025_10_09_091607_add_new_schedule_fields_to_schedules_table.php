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

            // Update sacrament_type enum to include new types
            $table->enum('sacrament_type', [
                'baptismal',
                'burial',
                'confirmation',
                'wedding',
                'blessing',
                'parish_mass',
                'barrio_mass',
                'school_mass',
            ])->change();

            // Blessing-specific fields
            $table->string('blessing_type')->nullable(); // house, store, office, vehicle, image
            $table->string('owner_name')->nullable();
            $table->text('address')->nullable();
            $table->string('barangay_name')->nullable();
            $table->integer('occupants_count')->nullable();
            $table->text('items_prepared')->nullable();
            $table->text('access_notes')->nullable();

            // Mass-specific fields (parish_mass, barrio_mass, school_mass)
            $table->string('mass_category')->nullable(); // sunday, weekday, feast_day, special
            $table->string('chapel_name')->nullable();
            $table->text('intention_summary')->nullable();
            $table->boolean('ministers_needed')->default(false);
            $table->string('choir_team')->nullable();
            $table->string('recurrence')->nullable(); // one-time, weekly, monthly

            // Barrio Mass-specific fields
            $table->string('sitio_name')->nullable();
            $table->string('barrio_coordinator')->nullable();
            $table->string('barrio_coordinator_phone')->nullable();
            $table->boolean('generator_needed')->default(false);
            $table->boolean('transport_needed')->default(false);

            // School Mass-specific fields
            $table->string('school_name')->nullable();
            $table->string('campus_or_venue')->nullable();
            $table->string('grade_levels')->nullable();
            $table->integer('expected_students')->nullable();
            $table->integer('expected_faculty')->nullable();
            $table->time('assembly_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Drop all new columns added in this migration
            $table->dropColumn([
                'blessing_type',
                'owner_name',
                'address',
                'barangay_name',
                'occupants_count',
                'items_prepared',
                'access_notes',
                'mass_category',
                'chapel_name',
                'intention_summary',
                'ministers_needed',
                'choir_team',
                'recurrence',
                'sitio_name',
                'barrio_coordinator',
                'barrio_coordinator_phone',
                'generator_needed',
                'transport_needed',
                'school_name',
                'campus_or_venue',
                'grade_levels',
                'expected_students',
                'expected_faculty',
                'assembly_time',
            ]);
        });
    }
};
