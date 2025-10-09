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
            // Change sacrament_type enum to include new types
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

            // Add new shared fields for mass and blessing schedules
            $table->string('presider_name')->nullable()->after('email');
            $table->text('location_text')->nullable()->after('presider_name');
            $table->timestamp('starts_at')->nullable()->after('location_text');
            $table->timestamp('ends_at')->nullable()->after('starts_at');
            $table->integer('expected_attendees')->nullable()->after('ends_at');
            $table->string('coordinator_name')->nullable()->after('expected_attendees');
            $table->string('coordinator_phone')->nullable()->after('coordinator_name');
            $table->boolean('requires_vehicle')->default(false)->after('coordinator_phone');
            $table->boolean('sound_system_needed')->default(false)->after('requires_vehicle');
            $table->decimal('stipend_amount', 10, 2)->nullable()->after('sound_system_needed');
            $table->text('remarks')->nullable()->after('stipend_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            // Remove new fields
            $table->dropColumn([
                'presider_name',
                'location_text',
                'starts_at',
                'ends_at',
                'expected_attendees',
                'coordinator_name',
                'coordinator_phone',
                'requires_vehicle',
                'sound_system_needed',
                'stipend_amount',
                'remarks',
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
