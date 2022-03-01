<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use UnitEnum;

trait EnumOptions
{
    /**
     * Convert cases of enum to collection options
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
     * Convert cases of enum to array options
     *
     * @return array
     */
    public static function optionsToArray(): array
    {
        return self::options()->toArray();
    }
}
