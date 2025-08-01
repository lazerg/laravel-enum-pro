<?php
declare(strict_types=1);

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
     * @return int|string|null
     */
    public static function valueOf(string $name): null|int|string
    {
        $name = Str::replace(' ', '_', Str::upper($name));

        return array_column(self::cases(), 'value', 'name')[$name] ?? null;
    }
}
