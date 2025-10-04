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
        'priest_status',
        'priest_notes',
        'priest_reviewed_at',
        'user_id',
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'priest_reviewed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function getSacramentTypeColorAttribute()
    {
        return match($this->sacrament_type) {
            'baptismal' => 'blue',
            'burial' => 'purple',
            'confirmation' => 'indigo',
            'wedding' => 'pink',
            default => 'gray',
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'confirmed' => 'blue',
            'completed' => 'green',
            'cancelled' => 'red',
            default => 'gray',
        };
    }

    public function getPriestStatusColorAttribute()
    {
        return match($this->priest_status) {
            'pending' => 'yellow',
            'approved' => 'green',
            'declined' => 'red',
            default => 'gray',
        };
    }
}
