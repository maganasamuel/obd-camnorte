<?php

namespace App\Traits\Scopes;

use Illuminate\Database\Eloquent\Builder;

trait HasEffectiveScope
{
    public function scopeEffective(Builder $query): void
    {
        $query->whereDate('effective_from', '<=', now()->format('Y-m-d'))
            ->whereDate('effective_to', '>=', now()->format('Y-m-d'));
    }

    public function scopeDormant(Builder $query): void
    {
        $query->whereDate('effective_from', '>', now()->format('Y-m-d'));
    }

    public function scopeExpired(Builder $query): void
    {
        $query->whereDate('effective_to', '<', now()->format('Y-m-d'));
    }
}
