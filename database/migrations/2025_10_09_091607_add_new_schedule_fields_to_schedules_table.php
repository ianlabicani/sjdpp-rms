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
                'school_mass'
            ])->change();

            // Common fields for all schedule types
            $table->string('presider_name')->nullable()->after('notes');
            $table->text('location_text')->nullable()->after('presider_name');
            $table->integer('expected_attendees')->nullable()->after('location_text');

            // Blessing-specific fields
            $table->string('blessing_type')->nullable()->after('expected_attendees'); // house, store, office, vehicle, image
            $table->string('owner_name')->nullable()->after('blessing_type');
            $table->text('address')->nullable()->after('owner_name');
            $table->foreignId('barangay_id')->nullable()->constrained()->nullOnDelete()->after('address');
            $table->integer('occupants_count')->nullable()->after('barangay_id');
            $table->text('items_prepared')->nullable()->after('occupants_count');
            $table->text('access_notes')->nullable()->after('items_prepared');

            // Mass-specific fields (parish_mass, barrio_mass, school_mass)
            $table->string('mass_category')->nullable()->after('access_notes'); // sunday, weekday, feast_day, special
            $table->foreignId('chapel_id')->nullable()->constrained()->nullOnDelete()->after('mass_category');
            $table->text('intention_summary')->nullable()->after('chapel_id');
            $table->boolean('ministers_needed')->default(false)->after('intention_summary');
            $table->string('choir_team')->nullable()->after('ministers_needed');
            $table->string('recurrence')->nullable()->after('choir_team'); // one-time, weekly, monthly

            // Barrio Mass-specific fields
            $table->string('sitio_name')->nullable()->after('recurrence');
            $table->string('barrio_coordinator')->nullable()->after('sitio_name');
            $table->string('barrio_coordinator_phone')->nullable()->after('barrio_coordinator');
            $table->boolean('generator_needed')->default(false)->after('barrio_coordinator_phone');
            $table->boolean('transport_needed')->default(false)->after('generator_needed');

            // School Mass-specific fields
            $table->foreignId('school_id')->nullable()->constrained()->nullOnDelete()->after('transport_needed');
            $table->string('campus_or_venue')->nullable()->after('school_id');
            $table->string('grade_levels')->nullable()->after('campus_or_venue');
            $table->integer('expected_students')->nullable()->after('grade_levels');
            $table->integer('expected_faculty')->nullable()->after('expected_students');
            $table->time('assembly_time')->nullable()->after('expected_faculty');

            // Common additional fields
            $table->boolean('sound_system_needed')->default(false)->after('assembly_time');
            $table->decimal('stipend_amount', 10, 2)->nullable()->after('sound_system_needed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Drop all new columns
            $table->dropColumn([
                'presider_name',
                'location_text',
                'expected_attendees',
                'blessing_type',
                'owner_name',
                'address',
                'barangay_id',
                'occupants_count',
                'items_prepared',
                'access_notes',
                'mass_category',
                'chapel_id',
                'intention_summary',
                'ministers_needed',
                'choir_team',
                'recurrence',
                'sitio_name',
                'barrio_coordinator',
                'barrio_coordinator_phone',
                'generator_needed',
                'transport_needed',
                'school_id',
                'campus_or_venue',
                'grade_levels',
                'expected_students',
                'expected_faculty',
                'assembly_time',
                'sound_system_needed',
                'stipend_amount'
            ]);

            // Revert sacrament_type enum to original values
            $table->enum('sacrament_type', [
                'baptismal',
                'burial',
                'confirmation',
                'wedding'
            ])->change();
        });
    }
};
