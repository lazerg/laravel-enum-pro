<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;
use Lazerg\LaravelEnumPro\Exceptions\TooManyRandomValuesException;

trait EnumRandom
{
    public static function randomArray(int $count = 1): array
    {
        $values = self::valuesToArray();

        if ($count > count($values)) {
            throw new TooManyRandomValuesException($count, count($values));
        }

        $keys = array_rand($values, $count);
        return array_map(fn($key) => $values[$key], (array) $keys);
    }

    public static function randomFirst(): int|string
    {
        return self::randomArray()[0];
    }

    public static function random(int $count = 1): Collection
    {
        return collect(self::randomArray($count));
    }
}
