<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryApplication extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'area_of_residence',
        'purpose_of_application',
        'programme'
    ];

    const PROGRAMME_INSPIRE_SCHOLARSHIP = 1;
    const PROGRAMME_LIVELONG_DEVELOPMENT = 2;
    const PROGRAMME_MENTORSHIP_CAREER_DAY = 3;
    const PROGRAMME_SCHOOL_BUILDS = 4;
    const PROGRAMME_SPECIAL_SCHOLARSHIP = 5;
    const PROGRAMME_SPECIAL_SUMMER_SCHOOL = 6;

    public static function getProgrammeMapping()
    {
        return [
            self::PROGRAMME_INSPIRE_SCHOLARSHIP => 'The Inspire Scholarship',
            self::PROGRAMME_LIVELONG_DEVELOPMENT => 'Livelong Development',
            self::PROGRAMME_MENTORSHIP_CAREER_DAY => 'Mentorship/Career Day Programme',
            self::PROGRAMME_SCHOOL_BUILDS => 'School Builds',
            self::PROGRAMME_SPECIAL_SCHOLARSHIP => 'Special Scholarship',
            self::PROGRAMME_SPECIAL_SUMMER_SCHOOL => 'Special Summer School',
        ];
    }
}
