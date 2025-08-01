<?php
declare(strict_types=1);

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use UnitEnum;

trait EnumOptions
{
    /**
     * Convert cases of enum to collection of options
     *
     * @input
     * case RENTAL_TRUCK = 1;
     * case CONTAINER = 2;
     * case FREIGHT_TRAILER = 3;
     *
     * @output
     * [
     *   1 => "Rental Truck"
     *   2 => "Container"
     *   3 => "Freight Trailer"
     * ]
     *
     * @return Collection
     */
    public static function options(): Collection
    {
        return collect(self::cases())->mapWithKeys(fn(UnitEnum $enum) => [
            $enum->value => Str::of($enum->name)
                ->replace('_', ' ')
                ->title()
                ->value()
        ]);
    }

    /**
     * Get a value of an option
     *
     * @param string $value
     * @return string
     */
    public static function getOption(string $value): string
    {
        return self::options()[$value];
    }

    /**
     * Get values of options
     *
     * @param array $values
     * @return Collection
     */
    public static function getOptions(array $values): Collection
    {
        return self::options()
            ->filter(fn($value, $key) => in_array($key, $values))
            ->values();
    }

    /**
     * Convert cases of enum to collection of selections
     *
     * @input
     * case RENTAL_TRUCK = 1;
     * case CONTAINER = 2;
     * case FREIGHT_TRAILER = 3;
     *
     * @output
     * [
     *  0 => ['value' => 1, 'display' => 'Rental Truck'],
     *  1 => ['value' => 2, 'display' => 'Container'],
     *  3 => ['value' => 3, 'display' => 'Freight Trailer']
     * ]
     *
     * @return Collection
     */
    public static function selections(): Collection
    {
        return self::options()
            ->map(fn($display, $value) => compact('value', 'display'))
            ->values();
    }

    /**
     * Convert cases of enum to array of options
     *
     * @return array
     */
    public static function optionsToArray(): array
    {
        return self::options()->toArray();
    }

    /**
     * Convert cases of enum to array of selections
     *
     * @return array
     */
    public static function selectionsToArray(): array
    {
        return self::selections()->toArray();
    }
}
