<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
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

  
    const TIMES_PER_WEEK_ONCE = 1;
    const TIMES_PER_WEEK_TWICE = 2;
    const TIMES_PER_WEEK_THRICE = 3;
    const TIMES_PER_WEEK_MONTH_ONCE = 4;
    const TIMES_PER_WEEK_MONTH_TWICE = 5;
    const TIMES_PER_WEEK_MONTH_THRICE = 6;
    const TIMES_PER_WEEK_OFTEN = 7;


    public static function getTimesPerWeekMapping()
    {
        return [
            self::TIMES_PER_WEEK_ONCE => "Once a week",
            self::TIMES_PER_WEEK_TWICE => "Twice a week",
            self::TIMES_PER_WEEK_THRICE => "Thrice a week",
            self::TIMES_PER_WEEK_MONTH_ONCE => "Once a month",
            self::TIMES_PER_WEEK_MONTH_TWICE => "Twice a month",
            self::TIMES_PER_WEEK_MONTH_THRICE => "Thrice a month",
            self::TIMES_PER_WEEK_OFTEN => "As often as i am needed",
        ];
    }

    public static function getInterestMapping()
    {
        return [
            self::INTEREST_ADVOCACY => "Advocacy & Research",
            self::INTEREST_BOOKREADING => "Book Reading",
            self::INTEREST_MENTORING => "Mentoring",
            self::INTEREST_EVENT => "Events planning/support",
            self::INTEREST_GRANT => "Grant writing & research",
            self::INTEREST_PROMOTION => "Promotion (Fundraising & publicity)",
            self::INTEREST_MUSIC => "Music lessons",
            self::INTEREST_IT => "Computer / IT Skills",
            self::INTEREST_TEACHING => "Adult literacy & Life Skills",
            self::INTEREST_HEALTH => "Health Services"
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
            self::AVAILABILITY_FLEXIBLE => "I am flexible",
            self::AVAILABILITY_WEEKDAYS => "Weekdays",
            self::AVAILABILITY_WEEKENDS => "Weekends",
            self::AVAILABILITY_MORNINGS => "Mornings",
            self::AVAILABILITY_EVENINGS => "Evenings",
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
            self::SOURCE_OTHER => 'Other',
        ];
    }

    public function toMappedArray()
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'gender' => self::getGenderMapping()[$this->gender] ?? $this->gender,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'area_of_residence' => $this->area_of_residence,
            'religious_affirmation' => $this->religious_affirmation,
            'availability' => is_array($decodedAvailability = json_decode($this->availability, true)) ? implode(' | ', array_map(function($a) {
                return self::getAvailabilityMapping()[intval($a)] ?? $a . ' ';
            }, $decodedAvailability)) : '',
            'specify_time' => $this->specify_time,
            'times_per_week_month' => self::getTimesPerWeekMapping()[$this->times_per_week_month] ?? $this->times_per_week_month,
            'other' => $this->other,
            'interests' => is_array($decodedInterests = json_decode($this->interests, true)) ? implode(' | ', array_map(function($interest) {
                return self::getInterestMapping()[intval($interest)] ?? $interest . ' ';
            }, $decodedInterests)) : '',
            'source' => self::getSourceMapping()[$this->source] ?? $this->source,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
