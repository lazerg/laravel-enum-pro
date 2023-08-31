<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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
        return self::values()->join(',');
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

    /**
     * Return value of enum by name
     *
     * @param string $name
     * @return int
     */
    public static function valueOf(string $name): int
    {
        $name = Str::replace(' ', '_', Str::upper($name));

        return collect(self::cases())
            ->filter(fn($case) => $case->name === Str::upper($name))
            ->first()
            ->value;
    }
}
