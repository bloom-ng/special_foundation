<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorshipInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'organisation_name',
        'contact_person',
        'role',
        'email',
        'contact_number',
        'location',
        'lga',
        'number_of_students',
        'age_class_range',
        'support_areas',
        'support_area_other',
        'session_goals',
        'additional_information',
    ];

    protected $casts = [
        'support_areas' => 'array',
    ];

    const SUPPORT_AREA_OTHER = 'Other';

    public static function getSupportAreas()
    {
        return [
            'Career Guidance',
            'Leadership',
            'Skills Development',
            'Personal Development',
            self::SUPPORT_AREA_OTHER,
        ];
    }

    public function supportAreasList(): string
    {
        $areas = $this->support_areas ?? [];

        if (in_array(self::SUPPORT_AREA_OTHER, $areas, true) && filled($this->support_area_other)) {
            $areas = array_map(function ($area) {
                return $area === self::SUPPORT_AREA_OTHER
                    ? self::SUPPORT_AREA_OTHER . ' (' . $this->support_area_other . ')'
                    : $area;
            }, $areas);
        }

        return empty($areas) ? '' : implode(', ', $areas);
    }

    public function toMappedArray()
    {
        return [
            'id' => $this->id,
            'organisation_name' => $this->organisation_name,
            'contact_person' => $this->contact_person,
            'role' => $this->role,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'location' => $this->location,
            'lga' => $this->lga,
            'number_of_students' => $this->number_of_students,
            'age_class_range' => $this->age_class_range,
            'support_areas' => $this->supportAreasList(),
            'session_goals' => $this->session_goals,
            'additional_information' => $this->additional_information,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
