<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummerSchoolWaitlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'centre_name',
        'contact_person',
        'role',
        'email',
        'contact_number',
        'location',
        'state',
        'lga',
        'number_of_children',
        'age_class_range',
        'education_status',
        'participation_type',
        'reason_for_consideration',
        'additional_information',
    ];

    protected $casts = [
        'education_status' => 'array',
        'participation_type' => 'array',
    ];

    public static function getEducationStatuses()
    {
        return [
            'In school',
            'Out of school',
        ];
    }

    public static function getParticipationTypes()
    {
        return [
            'Host a Summer School Centre',
            'Refer Children to the Program',
            'Teaching a program',
        ];
    }

    public function educationStatusList(): string
    {
        return implode(', ', $this->education_status ?? []);
    }

    public function participationList(): string
    {
        return implode(', ', $this->participation_type ?? []);
    }

    public function toMappedArray()
    {
        return [
            'id' => $this->id,
            'centre_name' => $this->centre_name,
            'contact_person' => $this->contact_person,
            'role' => $this->role,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'location' => $this->location,
            'state' => $this->state,
            'lga' => $this->lga,
            'number_of_children' => $this->number_of_children,
            'age_class_range' => $this->age_class_range,
            'education_status' => $this->educationStatusList(),
            'participation_type' => $this->participationList(),
            'reason_for_consideration' => $this->reason_for_consideration,
            'additional_information' => $this->additional_information,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
