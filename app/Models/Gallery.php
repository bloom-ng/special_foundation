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

    public static function updateEmbedCode($embedCode, $newWidth, $newHeight) {
        $pattern = '/<iframe.*?width="(\d+)" height="(\d+)".*?<\/iframe>/';
        preg_match($pattern, $embedCode, $match);
        
        if ($match) {
          $updatedEmbedCode = str_replace($match[1], $newWidth, $embedCode);
          $updatedEmbedCode = str_replace($match[2], $newHeight, $updatedEmbedCode);
          return $updatedEmbedCode;
        } else {
          return $embedCode;
        }
      }

    public static function getTypeMapping()
    {
        return [
            self::TYPE_YOUTUBE => 'Youtube',
            self::TYPE_IMAGE => 'Image',
            self::TYPE_VIDEO => 'Video'
        ];
    }
}
