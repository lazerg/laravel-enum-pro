<?php
declare(strict_types=1);

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
        return self::values()->random($count);
    }

    /**
     * Get one random value
     *
     * @return int|string
     */
    public static function randomFirst(): int|string
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
