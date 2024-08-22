<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Yajra\Address\Entities\Barangay as YajraBarangay;

class Barangay extends YajraBarangay
{
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }
}
