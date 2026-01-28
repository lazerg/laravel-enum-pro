<?php

namespace Lazerg\LaravelEnumPro\Exceptions;

use Exception;

class UndefinedCaseException extends Exception
{
    public function __construct(string $name)
    {
        parent::__construct("Case with name $name does not exist");
    }
}
