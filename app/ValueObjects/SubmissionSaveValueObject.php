<?php

namespace App\ValueObjects;

class SubmissionSaveValueObject extends AbstractValueObject
{
    public function __construct(
        protected readonly string $name,
        protected readonly string $email,
        protected readonly string $message,
    ) {
    }
}