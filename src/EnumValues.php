<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumValues
{
    /**
     * Return all values of enum as collection
     *
     * @return Collection
     */
    public static function values(): Collection
    {
        return collect(self::cases())
            ->map(fn($case) => $case->value ?? $case->name);
    }

    /**
     * Return all values of enum as string separated by comma
     *
     * @return string
     */
    public static function valuesToString(): string
    {
        return self::values()->join(', ');
    }

    /**
     * Return all values of enum as array
     *
     * @return array
     */
    public static function valuesToArray(): array
    {
        return self::values()->toArray();
    }
}
