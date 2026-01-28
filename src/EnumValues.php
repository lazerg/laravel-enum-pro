<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumValues
{
    public static function valuesToArray(): array
    {
        return array_column(self::cases(), 'value') ?: array_column(self::cases(), 'name');
    }

    public static function valuesToString(string $separator = ','): string
    {
        return implode($separator, self::valuesToArray());
    }

    public static function values(): Collection
    {
        return collect(self::valuesToArray());
    }

    public static function valueOf(string $name): null|int|string
    {
        $name = strtoupper(str_replace(' ', '_', $name));
        return array_column(self::cases(), 'value', 'name')[$name] ?? null;
    }
}
