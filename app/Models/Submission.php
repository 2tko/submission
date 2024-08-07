<?php

namespace App\Models;

use App\Events\SubmissionSaved;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Submission extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
