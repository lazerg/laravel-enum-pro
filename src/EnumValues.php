<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumValues
{
    /**
     * Get all enum case values as an array.
     *
     * @return array<int, int|string>
     * @example DifficultyEnum::valuesToArray()
     *          // [1, 2, 3, 4, 5]
     *
     */
    public static function valuesToArray(): array
    {
        return array_column(self::cases(), 'value') ?: array_column(self::cases(), 'name');
    }

    /**
     * Get all enum case values as a string.
     *
     * @param string $separator
     * @return string
     * @example DifficultyEnum::valuesToString()
     *          // '1,2,3,4,5'
     *
     * @example DifficultyEnum::valuesToString(' | ')
     *          // '1 | 2 | 3 | 4 | 5'
     *
     */
    public static function valuesToString(string $separator = ','): string
    {
        return implode($separator, self::valuesToArray());
    }

    /**
     * Get all enum case values as a Collection.
     *
     * @return Collection<int, int|string>
     * @example DifficultyEnum::values()
     *          // Collection([1, 2, 3, 4, 5])
     *
     */
    public static function values(): Collection
    {
        return collect(self::valuesToArray());
    }

    /**
     * Get the enum case value by its name (case-insensitive, spaces become underscores).
     *
     * @param string $name
     * @return int|string|null
     * @example DifficultyEnum::valueOf('Very Strong')
     *          // 5
     *
     * @example DifficultyEnum::valueOf('invalid')
     *          // null
     *
     * @example DifficultyEnum::valueOf('VERY_EASY')
     *          // 1
     *
     * @example DifficultyEnum::valueOf('medium')
     *          // 3
     *
     */
    public static function valueOf(string $name): null|int|string
    {
        $name = strtoupper(str_replace(' ', '_', $name));
        return array_column(self::cases(), 'value', 'name')[$name] ?? null;
    }
}
