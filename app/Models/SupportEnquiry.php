<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'phone', 'country',
        'support_type', 'occasion_date', 'fundraising_goal', 'message',
    ];

    protected $casts = [
        'occasion_date' => 'date',
    ];

    /**
     * Support types, keyed by the value used in the ?type= link parameter.
     */
    public static function getSupportTypes(): array
    {
        return [
            'fundraiser' => 'Fundraiser',
            'monthly-giving' => 'Monthly giving',
            'workplace-giving' => 'Workplace giving',
            'event' => 'Event',
            'tribute-gift' => 'Tribute gift',
            'other' => 'Other',
        ];
    }

    public static function labelForType(?string $key): ?string
    {
        return self::getSupportTypes()[strtolower((string) $key)] ?? null;
    }

    public function toMappedArray(): array
    {
        return [
            'Full Name' => $this->full_name,
            'Email' => $this->email,
            'Phone (WhatsApp)' => $this->phone,
            'Country' => $this->country,
            'Support Type' => $this->support_type,
            'Occasion / Event Date' => $this->occasion_date?->format('Y-m-d'),
            'Fundraising Goal' => $this->fundraising_goal,
            'Message' => $this->message,
            'Submitted' => $this->created_at?->format('Y-m-d H:i'),
        ];
    }
}
