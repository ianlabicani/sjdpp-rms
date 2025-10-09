<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'municipality',
        'zip_code',
    ];

    public function chapels()
    {
        return $this->hasMany(Chapel::class);
    }

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
