<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumNames
{
    /**
     * Get all enum case names as an array.
     *
     * @return array<int, string>
     * @example DifficultyEnum::namesToArray()
     *          // ['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG']
     *
     */
    public static function namesToArray(): array
    {
        return array_column(self::cases(), 'name');
    }

    /**
     * Get all enum case names as a string.
     *
     * @param string $separator
     * @return string
     * @example DifficultyEnum::namesToString()
     *          // 'VERY_EASY, EASY, MEDIUM, STRONG, VERY_STRONG'
     *
     * @example DifficultyEnum::namesToString(' | ')
     *          // 'VERY_EASY | EASY | MEDIUM | STRONG | VERY_STRONG'
     *
     */
    public static function namesToString(string $separator = ', '): string
    {
        return implode($separator, self::namesToArray());
    }

    /**
     * Get all enum case names as a Collection.
     *
     * @return Collection<int, string>
     * @example DifficultyEnum::names()
     *          // Collection(['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG'])
     *
     */
    public static function names(): Collection
    {
        return collect(self::namesToArray());
    }

    /**
     * Get the enum case name by its value.
     *
     * @param mixed $value
     * @return string|null
     * @example DifficultyEnum::nameOf(3)
     *          // 'MEDIUM'
     *
     * @example DifficultyEnum::nameOf(99)
     *          // null
     *
     */
    public static function nameOf(mixed $value): ?string
    {
        return array_column(self::cases(), 'name', 'value')[$value] ?? null;
    }
}
