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

    const GENDER_MALE = "Male";
    const GENDER_FEMALE = "Female";

    const AVAILABILITY_FLEXIBLE = 1;
    const AVAILABILITY_WEEKDAYS = 2;
    const AVAILABILITY_WEEKENDS = 3;
    const AVAILABILITY_MORNINGS = 4;
    const AVAILABILITY_EVENINGS = 5;

    const INTEREST_ADVOCACY = 1;
    const INTEREST_BOOKREADING = 2;
    const INTEREST_MENTORING = 3;
    const INTEREST_EVENT = 4;
    const INTEREST_GRANT = 5;
    const INTEREST_PROMOTION = 6;
    const INTEREST_MUSIC = 7;
    const INTEREST_IT = 8;
    const INTEREST_TEACHING = 9;
    const INTEREST_HEALTH = 10;

    public static function getInterestMapping()
    {
        return [
            INTEREST_ADVOCACY => "Advocacy & Research",
            INTEREST_BOOKREADING => "Book Reading",
            INTEREST_MENTORING => "Mentoring",
            INTEREST_EVENT => "Events planning/support",
            INTEREST_GRANT => "Grant writing & research",
            INTEREST_PROMOTION => "Promotion (Fundraising & publicity)",
            INTEREST_MUSIC => "Music lessons",
            INTEREST_IT => "Computer / IT Skills",
            INTEREST_TEACHING => "Adult literacy & Life Skills",
            INTEREST_HEALTH => "Health Services"
        ];
    }


    public static function getGenderMapping()
    {
        return [
            self::GENDER_MALE => "Male",
            self::GENDER_FEMALE => "Female"
        ];
    }

    public static function getAvailabilityMapping()
    {
        return [
            AVAILABILITY_FLEXIBLE => "I am flexible",
            AVAILABILITY_WEEKDAYS => "Weekdays",
            AVAILABILITY_WEEKENDS => "Weekends",
            AVAILABILITY_MORNINGS => "Mornings",
            AVAILABILITY_EVENINGS => "Evenings",
        ];
    }

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
            self::SOURCE_REFERRAL_PARTNER_AFFILIATE => 'Partner or Affiliate',
            self::SOURCE_ONLINE_DIRECTORY_LISTING => 'Online Directory or Listing',
            self::SOURCE_OTHER => 'Other (specify in comment)',
        ];
    }
}
