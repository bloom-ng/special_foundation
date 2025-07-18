<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummerSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'banner',
        'start_date',
        'end_date',
        'volunteer_locations',
        'status',
    ];

    public function volunteerEntries()
    {
        return $this->hasMany(SummerSchoolVolunteerEntry::class);
    }
}
