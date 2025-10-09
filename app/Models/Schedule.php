<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'sacrament_type',
        'client_name',
        'contact_number',
        'email',
        'schedule_date',
        'schedule_time',
        'notes',
        'status',
        'priest_notes',
        'priest_reviewed_at',
        'user_id',
        // Common fields
        'presider_name',
        'location_text',
        'expected_attendees',
        // Blessing fields
        'blessing_type',
        'owner_name',
        'address',
        'barangay_name',
        'occupants_count',
        'items_prepared',
        'access_notes',
        // Mass fields
        'mass_category',
        'chapel_name',
        'intention_summary',
        'ministers_needed',
        'choir_team',
        'recurrence',
        // Barrio Mass fields
        'sitio_name',
        'barrio_coordinator',
        'barrio_coordinator_phone',
        'generator_needed',
        'transport_needed',
        // School Mass fields
        'school_name',
        'campus_or_venue',
        'grade_levels',
        'expected_students',
        'expected_faculty',
        'assembly_time',
        // Common additional fields
        'sound_system_needed',
        'stipend_amount',
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'schedule_time' => 'datetime:H:i',
        'priest_reviewed_at' => 'datetime',
        'ministers_needed' => 'boolean',
        'generator_needed' => 'boolean',
        'transport_needed' => 'boolean',
        'sound_system_needed' => 'boolean',
        'stipend_amount' => 'decimal:2',
        'expected_attendees' => 'integer',
        'occupants_count' => 'integer',
        'expected_students' => 'integer',
        'expected_faculty' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getSacramentTypeColorAttribute()
    {
        return match ($this->sacrament_type) {
            'baptismal' => 'blue',
            'burial' => 'purple',
            'confirmation' => 'indigo',
            'wedding' => 'pink',
            'blessing' => 'teal',
            'parish_mass' => 'cyan',
            'barrio_mass' => 'emerald',
            'school_mass' => 'amber',
            default => 'gray',
        };
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'pending' => 'yellow',
            'cancelled' => 'gray',
            'approved' => 'green',
            'declined' => 'red',
            'completed' => 'blue',
            default => 'gray',
        };
    }
}
