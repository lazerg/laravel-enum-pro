<?php

namespace Lazerg\LaravelEnumPro\Exceptions;

use InvalidArgumentException;

class TooManyRandomValuesException extends InvalidArgumentException
{
    public function __construct(int $requested, int $available)
    {
        parent::__construct("Cannot get $requested random values, only $available available");
    }
}
