<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'barangay_id',
        'address',
        'school_type',
        'contact_person',
        'contact_phone',
        'email',
    ];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
