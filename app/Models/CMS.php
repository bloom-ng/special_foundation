<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CMS extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'slug',
        'name',
        'type',
        'value',
    ];

    const TYPE_TEXT = 1;
    const TYPE_FORMATTED_TEXT = 2;
    const TYPE_NUMBER = 3;

    public static function getTypeMapping()
    {
        return [
            self::TYPE_TEXT => 'Text',
            self::TYPE_FORMATTED_TEXT => 'Formatted Text',
            self::TYPE_NUMBER => 'Number'
        ];
    }
}
