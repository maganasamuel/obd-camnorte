<?php

namespace App\Models;

use App\Traits\Attributes\HasEffectiveAttribute;
use App\Traits\HasOrderColumn;
use App\Traits\Scopes\{HasActiveScope, HasEffectiveScope};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Ad extends Model implements HasMedia
{
    use HasFactory;
    use HasOrderColumn;
    use HasActiveScope;
    use HasEffectiveScope;
    use HasEffectiveAttribute;
    use InteractsWithMedia;

    protected $appends = [
        'effectivity',
        'effective_period',
    ];

    protected function casts(): array
    {
        return [
            'effective_from' => 'date',
            'effective_to' => 'date',
            'active' => 'boolean',
        ];
    }
}
