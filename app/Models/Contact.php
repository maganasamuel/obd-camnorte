<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model};

class Contact extends Model
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
        static::created(function (Contact $contact) {
            $contact->update(['order' => $contact->id]);
        });
    }
}
