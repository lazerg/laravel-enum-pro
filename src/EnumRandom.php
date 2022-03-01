<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;
use InvalidArgumentException;

trait EnumRandom
{
    /**
     * Get $count random values in collection
     *
     * @param int $count
     * @return Collection
     */
    public static function random(int $count = 1): Collection
    {
        if ($count > self::values()->count()) {
            throw new InvalidArgumentException('Count of random values is greater than count of enum values');
        }

        return self::values()->shuffle()->take($count);
    }

    /**
     * Get one random value
     *
     * @return int
     */
    public static function randomFirst(): int
    {
        return self::random()->first();
    }

    /**
     * Get $count random values in array
     *
     * @param int $count
     * @return array
     */
    public static function randomArray(int $count = 1): array
    {
        return self::random($count)->toArray();
    }
}
