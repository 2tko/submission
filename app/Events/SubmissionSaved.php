<?php

namespace App\Events;

use App\Models\Submission;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, SerializesModels;

    public function __construct(private readonly Submission $submission)
    {
    }

    public function getSubmission(): Submission
    {
        return $this->submission;
    }
}
