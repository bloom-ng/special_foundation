<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonorInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'country',
        'occupation',
        'linkedin',
        'bio',
        'children_count',
        'preferred_age',
        'preferred_location',
        'students_count',
        'preferred_field',
        'institution_type',
        'duration',
        'notes',
        'agree',
    ];
}
