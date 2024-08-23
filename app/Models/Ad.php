<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Ad extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function scopeActive(Builder $query): void
    {
        $query->where('active', true);
    }

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::created(function (Ad $ad) {
            $ad->update(['order' => $ad->id]);
        });
    }
}
