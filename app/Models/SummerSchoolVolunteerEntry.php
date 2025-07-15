<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummerSchoolVolunteerEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'summer_school_id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'profession',
        'preferred_locations',
        'volunteering_with',
        'tshirt_size',
        'available_dates',
    ];

    public function summerSchool()
    {
        return $this->belongsTo(SummerSchool::class);
    }
}
