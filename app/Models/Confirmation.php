<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $fillable = [
        'year',
        'date_of_confirmation',
        'name',
        'parish_of_baptism',
        'province_of_baptism',
        'place_of_baptism',
        'parents',
        'sponsor',
        'name_of_minister',
    ];

    protected $casts = [
        'date_of_confirmation' => 'date',
    ];
}
