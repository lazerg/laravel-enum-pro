<?php

namespace Lazerg\LaravelEnumPro;

use Lazerg\LaravelEnumPro\Exceptions\UndefinedCaseException;

trait EnumStaticCalls
{
    public function __invoke(): int|string
    {
        return $this->value ?? $this->name;
    }

    public static function __callStatic(string $name, array $arguments): int|string
    {
        return array_column(self::cases(), 'value', 'name')[$name]
            ?? throw new UndefinedCaseException($name);
    }
}
