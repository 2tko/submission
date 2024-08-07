<?php

namespace App\ValueObjects;

abstract class AbstractValueObject
{
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}