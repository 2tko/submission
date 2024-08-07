<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use App\Models\SubmissionLog;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmissionSavedSuccessfully implements ShouldQueue
{
    public function handle(SubmissionSaved $event): void
    {
        (new SubmissionLog())
            ->setAttribute('meta', [
                'name' => $event->getSubmission()->name,
                'email' => $event->getSubmission()->email,
            ])
            ->save();
    }
}
