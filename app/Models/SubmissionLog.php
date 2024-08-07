<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property array $meta
 * @property Carbon $created_At
 */
class SubmissionLog extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'meta',
    ];

    protected function meta(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
