<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'comments',
        'source'
    ];

    const SOURCE_SOCIAL_MEDIA = 1;
    const SOURCE_GOOGLE_SEARCH = 2;
    const SOURCE_WORD_OF_MOUTH = 3;
    const SOURCE_ONLINE_ADVERTISING = 4;
    const SOURCE_EMAIL_MARKETING = 5;
    const SOURCE_CONTENT_MARKETING = 6;
    const SOURCE_EVENT_OR_CONFERENCE = 7;
    const SOURCE_REFERRAL_PARTNER_AFFILIATE = 8;
    const SOURCE_ONLINE_DIRECTORY_LISTING = 9;
    const SOURCE_OTHER = 10;

    public static function getSourceMapping()
    {
        return [
            self::SOURCE_SOCIAL_MEDIA => 'Social Media',
            self::SOURCE_GOOGLE_SEARCH => 'Google Search',
            self::SOURCE_WORD_OF_MOUTH => 'Word of Mouth',
            self::SOURCE_ONLINE_ADVERTISING => 'Online Advertising',
            self::SOURCE_EMAIL_MARKETING => 'Email Marketing',
            self::SOURCE_CONTENT_MARKETING => 'Content Marketing',
            self::SOURCE_EVENT_OR_CONFERENCE => 'Event or Conference',
            self::SOURCE_REFERRAL_PARTNER_AFFILIATE => 'Referral from Partner or Affiliate',
            self::SOURCE_ONLINE_DIRECTORY_LISTING => 'Online Directory or Listing',
            self::SOURCE_OTHER => 'Other (specify in comment)',
        ];
    }

public function toMappedArray()
{
    return [
        'id' => $this->id,
        'name' => $this->name,
        'email' => $this->email,
        'contact_number' => $this->contact_number,
        'comments' => $this->comments,
        'source' => self::getSourceMapping()[$this->source] ?? 'Unknown Source',
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
}
}
