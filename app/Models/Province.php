<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Yajra\Address\Entities\Province as YajraProvince;

class Province extends YajraProvince
{
    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'province_id', 'province_id');
    }
}
