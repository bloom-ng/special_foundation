<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'gender',
        'email',
        'contact_number',
        'area_of_residence',
        'religious_affirmation',
        'availability',
        'specify_time',
        'times_per_week_month',
        'other',
        'interests',
        'source',
    ];
}
