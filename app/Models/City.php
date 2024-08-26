<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};
use Yajra\Address\Entities\City as YajraCity;

class City extends YajraCity
{
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }

    public function barangays(): HasMany
    {
        return $this->hasMany(Barangay::class, 'city_id', 'city_id');
    }

    public function scopeProvinced(Builder $query): void
    {
        $query->where('province_id', config('options.province.id'));
    }
}
