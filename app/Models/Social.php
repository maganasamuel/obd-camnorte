<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected static function booted()
    {
        static::created(function (Social $social) {
            $social->update(['order' => $social->id]);
        });
    }
}
