<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Burial extends Model
{
    protected $fillable = [
        'name',
        'date_of_death',
        'date_of_burial',
        'age',
        'status',
        'informant',
        'place',
        'presider',
    ];

    protected $casts = [
        'date_of_death' => 'date',
        'date_of_burial' => 'date',
    ];
}
