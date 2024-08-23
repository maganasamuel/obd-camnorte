<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasOrderColumn
{
    protected static function bootHasOrderColumn(): void
    {
        static::created(function (Model $model) {
            $model->update(['order' => $model->id]);
        });
    }
}
