<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    public const CATEGORY_AWARD = 'award';
    public const CATEGORY_MEMBERSHIP = 'membership';

    protected $fillable = [
        'name',
        'year',
        'category',
        'recognition',
        'link',
        'image',
        'status',
        'sort_order',
    ];

    /**
     * Admin-facing labels for each group.
     */
    public static function getCategories(): array
    {
        return [
            self::CATEGORY_AWARD => 'Awards',
            self::CATEGORY_MEMBERSHIP => 'Memberships and verification',
        ];
    }

    public function categoryLabel(): string
    {
        return self::getCategories()[$this->category] ?? ucfirst((string) $this->category);
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
     * Active items grouped by category, each group in display order.
     *
     * @return array<string, \Illuminate\Support\Collection>
     */
    public static function grouped(): array
    {
        $items = self::active()->ordered()->get()->groupBy('category');

        $grouped = [];
        foreach (array_keys(self::getCategories()) as $category) {
            if ($items->has($category) && $items[$category]->isNotEmpty()) {
                $grouped[$category] = $items[$category];
            }
        }

        return $grouped;
    }
}
