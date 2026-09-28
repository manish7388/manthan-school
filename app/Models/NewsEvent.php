<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsEvent extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'date',
        'image',
        'short_description',
        'content',
        'is_published',
    ];

    protected static function booted(): void
    {
        static::creating(function (NewsEvent $newsEvent) {
            if (!$newsEvent->id) {
                $newsEvent->id = (int) (microtime(true) * 1000000);
            }
        });
    }

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'is_published' => 'boolean',
        ];
    }
}