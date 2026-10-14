<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBuildInterest extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_name',
        'contact_person',
        'role',
        'email',
        'contact_number',
        'school_address',
        'state',
        'lga',
        'number_of_students',
        'property_ownership',
        'school_needs',
        'needs_details',
        'photos',
    ];

    protected $casts = [
        'photos' => 'array',
        'property_ownership' => 'array',
    ];

    const OWNERSHIP_OWNED = 'Owned';
    const OWNERSHIP_LEASED = 'Leased';
    const OWNERSHIP_RENTED = 'Rented';

    public static function getOwnershipOptions()
    {
        return [
            self::OWNERSHIP_OWNED,
            self::OWNERSHIP_LEASED,
            self::OWNERSHIP_RENTED,
        ];
    }

    public function ownershipList(): string
    {
        return implode(', ', $this->property_ownership ?? []);
    }

    /**
     * Resolve each stored photo to a browsable URL, whether it came from
     * Cloudinary (absolute URL) or the local public disk (relative path).
     */
    public function photoUrls(): array
    {
        return array_map(function ($photo) {
            if (preg_match('/^https?:\/\//i', $photo)) {
                return $photo;
            }

            return url('storage/' . ltrim(preg_replace('/^\/?(public\/)?storage\//i', '', $photo), '/'));
        }, $this->photos ?? []);
    }

    public function toMappedArray()
    {
        return [
            'id' => $this->id,
            'school_name' => $this->school_name,
            'contact_person' => $this->contact_person,
            'role' => $this->role,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'school_address' => $this->school_address,
            'state' => $this->state,
            'lga' => $this->lga,
            'number_of_students' => $this->number_of_students,
            'property_ownership' => $this->ownershipList(),
            'school_needs' => $this->school_needs,
            'needs_details' => $this->needs_details,
            'photos' => implode(', ', $this->photoUrls()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
