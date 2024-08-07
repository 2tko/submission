<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\ValueObjects\AbstractValueObject;
use App\Models\Submission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SubmissionSaveJob implements ShouldQueue
{
    use Queueable;

    public function __construct(private readonly AbstractValueObject $saveValueObject)
    {
    }

    public function handle(): void
    {
        $submission = (new Submission())
            ->fill($this->saveValueObject->toArray());

        if ($submission->save()) {
            $submission->refresh();

            SubmissionSaved::dispatch($submission);
        }
    }
}
