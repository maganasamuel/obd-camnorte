<?php

namespace App\Models;

use App\Traits\HasOrderColumn;
use App\Traits\Scopes\HasActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    use HasOrderColumn;
    use HasActiveScope;

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }
}
