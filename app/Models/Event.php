<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'image',
        'date',
        'content',
        'status',
        'image_width',
        'image_height'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function entries()
    {
        return $this->hasMany(EventEntry::class);
    }

    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
