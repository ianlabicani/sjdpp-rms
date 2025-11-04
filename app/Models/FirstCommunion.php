<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirstCommunion extends Model
{
    protected $fillable = [
        'year',
        'month',
        'day',
        'names',
        'parents',
        'address',
        'minister',
        'baptismal_date',
        'baptismal_place',
        'church_name',
    ];

    protected $casts = [
        'baptismal_date' => 'date',
        'names' => 'array',
        'parents' => 'array',
    ];

    // Color for UI purposes
    public function getCommunionDateAttribute()
    {
        return \Carbon\Carbon::create($this->year, $this->month, $this->day);
    }

    public static function getStatusColor($status = 'teal')
    {
        return $status;
    }
}
