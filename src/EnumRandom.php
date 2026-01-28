<?php

namespace Lazerg\LaravelEnumPro;

use Illuminate\Support\Collection;
use Lazerg\LaravelEnumPro\Exceptions\TooManyRandomValuesException;

trait EnumRandom
{
    /**
     * Get random enum values as an array.
     *
     * @param int $count
     * @return array<int, int|string>
     * @throws TooManyRandomValuesException When requesting more values than available
     * @example DifficultyEnum::randomArray(2)
     *          // [3, 1] (random)
     *
     */
    public static function randomArray(int $count = 1): array
    {
        $values = self::valuesToArray();

        if ($count > count($values)) {
            throw new TooManyRandomValuesException($count, count($values));
        }

        $keys = array_rand($values, $count);
        return array_map(fn($key) => $values[$key], (array) $keys);
    }

    /**
     * Get a single random enum value.
     *
     * @return int|string
     * @example DifficultyEnum::randomFirst()
     *          // 4 (random)
     *
     */
    public static function randomFirst(): int|string
    {
        return self::randomArray()[0];
    }

    /**
     * Get random enum values as a Collection.
     *
     * @param int $count
     * @return Collection<int, int|string>
     * @throws TooManyRandomValuesException When requesting more values than available
     * @example DifficultyEnum::random(3)
     *          // Collection([2, 5, 1]) (random)
     *
     */
    public static function random(int $count = 1): Collection
    {
        return collect(self::randomArray($count));
    }
}
