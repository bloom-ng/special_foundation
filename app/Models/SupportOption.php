<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportOption extends Model
{
    use HasFactory;

    public const GROUP_INDIVIDUALS = 'individuals';
    public const GROUP_BUSINESSES = 'businesses';

    protected $fillable = [
        'group', 'title', 'body', 'image',
        'button_label', 'button_url',
        'secondary_label', 'secondary_url',
        'track_id', 'status', 'sort_order',
    ];

    public static function getGroups(): array
    {
        return [
            self::GROUP_INDIVIDUALS => 'For Individuals',
            self::GROUP_BUSINESSES => 'For Businesses and Groups',
        ];
    }

    public function groupLabel(): string
    {
        return self::getGroups()[$this->group] ?? ucfirst((string) $this->group);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('id', 'asc');
    }

    /**
     * @return array<string, \Illuminate\Support\Collection>
     */
    public static function grouped(): array
    {
        $items = self::active()->ordered()->get()->groupBy('group');

        $grouped = [];
        foreach (array_keys(self::getGroups()) as $group) {
            if ($items->has($group) && $items[$group]->isNotEmpty()) {
                $grouped[$group] = $items[$group];
            }
        }

        return $grouped;
    }
}
