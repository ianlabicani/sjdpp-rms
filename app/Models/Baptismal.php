<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baptismal extends Model
{
    protected $fillable = [
        'name',
        'birth_date',
        'baptism_date',
        'fathers_name',
        'mothers_name',
        'church_name',
        'sponsor',
        'secondary_sponsor',
        'priest_name',
        'book_number',
        'page_number',
        'line_number',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'baptism_date' => 'date',
    ];
}
