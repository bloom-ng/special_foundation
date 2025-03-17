<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'first_name',
        'last_name',
        'email',
        'company',
        'phone_number',
        'will_attend'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
