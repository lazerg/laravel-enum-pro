<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumOptions
{
    /**
     * Get all enum cases as key-value array with formatted labels.
     *
     * @return array<int|string, string>
     * @example DifficultyEnum::optionsToArray()
     *          // [1 => 'Very Easy', 2 => 'Easy', 3 => 'Medium', 4 => 'Strong', 5 => 'Very Strong']
     *
     */
    public static function optionsToArray(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => ucwords(strtolower(str_replace('_', ' ', $case->name))), self::cases())
        );
    }

    /**
     * Get all enum cases as a Collection with formatted labels.
     *
     * @return Collection<int|string, string>
     * @example DifficultyEnum::options()
     *          // Collection([1 => 'Very Easy', 2 => 'Easy', 3 => 'Medium', 4 => 'Strong', 5 => 'Very Strong'])
     *
     */
    public static function options(): Collection
    {
        return collect(self::optionsToArray());
    }

    /**
     * Get a single option label by its value.
     *
     * @param mixed $value
     * @return string|null
     * @example DifficultyEnum::getOption(5)
     *          // 'Very Strong'
     *
     * @example DifficultyEnum::getOption(99)
     *          // null
     *
     */
    public static function getOption(mixed $value): ?string
    {
        return self::optionsToArray()[$value] ?? null;
    }

    /**
     * Get multiple option labels by their values.
     *
     * @param array $values
     * @return array<int, string>
     * @example DifficultyEnum::getOptions([3, 5])
     *          // ['Medium', 'Very Strong']
     *
     */
    public static function getOptions(array $values): array
    {
        return array_values(array_intersect_key(self::optionsToArray(), array_flip($values)));
    }

    /**
     * Get all enum cases as array of selections for form inputs.
     *
     * @return array<int, array{value: int|string, display: string}>
     * @example DifficultyEnum::selectionsToArray()
     *          // [
     *          //     ['value' => 1, 'display' => 'Very Easy'],
     *          //     ['value' => 2, 'display' => 'Easy'],
     *          //     ['value' => 3, 'display' => 'Medium'],
     *          //     ['value' => 4, 'display' => 'Strong'],
     *          //     ['value' => 5, 'display' => 'Very Strong'],
     *          // ]
     *
     */
    public static function selectionsToArray(): array
    {
        $options = self::optionsToArray();
        return array_map(fn($value) => ['value' => $value, 'display' => $options[$value]], array_keys($options));
    }

    /**
     * Get all enum cases as Collection of selections for form inputs.
     *
     * @return Collection<int, array{value: int|string, display: string}>
     * @example DifficultyEnum::selections()
     *          // Collection([
     *          //     ['value' => 1, 'display' => 'Very Easy'],
     *          //     ['value' => 2, 'display' => 'Easy'],
     *          //     ...
     *          // ])
     *
     */
    public static function selections(): Collection
    {
        return collect(self::selectionsToArray());
    }
}
