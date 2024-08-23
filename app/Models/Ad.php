<?php

namespace App\Models;

use App\Traits\Scopes\{HasActiveScope, HasEffectiveScope};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Ad extends Model implements HasMedia
{
    use HasFactory;
    use HasActiveScope;
    use HasEffectiveScope;
    use InteractsWithMedia;

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'effective_from' => 'date',
            'effective_to' => 'date',
        ];
    }

    protected static function booted(): void
    {
        static::created(function (Ad $ad) {
            $ad->update(['order' => $ad->id]);
        });
    }
}
