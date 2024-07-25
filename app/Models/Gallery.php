<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'value', 'url'];

    const TYPE_IMAGE = 1;
    const TYPE_YOUTUBE = 2;
    const TYPE_VIDEO = 3;

    public static function getTypeMapping()
    {
        return [
            self::TYPE_YOUTUBE => 'Youtube',
            self::TYPE_IMAGE => 'Image',
            self::TYPE_VIDEO => 'Video'
        ];
    }
}
