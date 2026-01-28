<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;

trait EnumOptions
{
    public static function optionsToArray(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => ucwords(strtolower(str_replace('_', ' ', $case->name))), self::cases())
        );
    }

    public static function options(): Collection
    {
        return collect(self::optionsToArray());
    }

    public static function getOption(mixed $value): ?string
    {
        return self::optionsToArray()[$value] ?? null;
    }

    public static function getOptions(array $values): array
    {
        return array_values(array_intersect_key(self::optionsToArray(), array_flip($values)));
    }

    public static function selectionsToArray(): array
    {
        $options = self::optionsToArray();
        return array_map(fn($value) => ['value' => $value, 'display' => $options[$value]], array_keys($options));
    }

    public static function selections(): Collection
    {
        return collect(self::selectionsToArray());
    }
}
