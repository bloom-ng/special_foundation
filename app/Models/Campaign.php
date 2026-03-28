<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'hero_title',
        'hero_text',
        'hero_image',
        'banner_image',
        'show_banner',
        'show_countdown',
        'countdown_date',
        'sections',
        'stats',
        'testimonial',
        'primary_cta_text',
        'primary_cta_link',
        'secondary_cta_text',
        'secondary_cta_link',
        'show_in_menu',
        'menu_title',
    ];

    protected $casts = [
        'sections' => 'array',
        'show_banner' => 'boolean',
        'show_countdown' => 'boolean',
        'show_in_menu' => 'boolean',
        'countdown_date' => 'datetime',
        'stats' => 'array',
    ];
}
