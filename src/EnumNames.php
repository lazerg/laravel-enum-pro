<?php
declare(strict_types=1);

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumNames
{
    /**
     * Return all names of enum as collection
     *
     * @return Collection
     */
    public static function names(): Collection
    {
        return collect(self::cases())->pluck('name');
    }

    /**
     * Return all names of enum as string separated by comma
     *
     * @return string
     */
    public static function namesToString(): string
    {
        return self::names()->join(', ');
    }

    /**
     * Return all names of enum as array
     *
     * @return array
     */
    public static function namesToArray(): array
    {
        return self::names()->toArray();
    }

    public static function nameOf(mixed $case): string
    {
        return array_column(self::cases(), 'name', 'value')[$case];
    }
}
