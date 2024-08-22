<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};

class Social extends Model
{
    use HasFactory;

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
        static::created(function (Social $social) {
            $social->update(['order' => $social->id]);
        });
    }
}
