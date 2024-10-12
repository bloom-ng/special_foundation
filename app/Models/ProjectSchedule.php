<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProjectSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'project',
        'year',
        'month'
    ];

    public function getMonth()
    {
        return ProjectSchedule::getMonths()[$this->month];
    }

    public static function getYears()
    {
        $currentYear = Carbon::now()->year;
        return [
            $currentYear - 1,
            $currentYear,
            $currentYear + 1,
            $currentYear + 2,
            $currentYear + 3
        ];
    }

    public static function getMonths()
    {
        return [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December'
        ];
    }
}
