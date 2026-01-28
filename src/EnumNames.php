<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumNames
{
    public static function namesToArray(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function namesToString(string $separator = ', '): string
    {
        return implode($separator, self::namesToArray());
    }

    public static function names(): Collection
    {
        return collect(self::namesToArray());
    }

    public static function nameOf(mixed $value): ?string
    {
        return array_column(self::cases(), 'name', 'value')[$value] ?? null;
    }
}
