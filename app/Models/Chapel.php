<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'barangay_id',
        'address',
        'contact_person',
        'contact_phone',
        'seating_capacity',
    ];

    protected $casts = [
        'seating_capacity' => 'integer',
    ];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
