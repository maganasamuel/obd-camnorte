<?php

namespace App\Traits\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

trait HasEffectivityAttribute
{
    protected function effectivity(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                if (now()->between($attributes['effective_from'], $attributes['effective_to'])) {
                    return 'active';
                }

                if (Carbon::parse($attributes['effective_from'])->isFuture()) {
                    return 'dormant';
                }

                if (Carbon::parse($attributes['effective_to'])->isPast()) {
                    return 'expired';
                }
            }
        );
    }

    protected function effectivePeriod(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => str(
                Carbon::parse($attributes['effective_to'])
                    ->diffForHumans(Carbon::parse($attributes['effective_from']))
            )->replace(' after', '')->value()
        );
    }
}
