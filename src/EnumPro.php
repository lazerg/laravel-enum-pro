<?php

namespace Lazerg\LaravelEnumPro;

/**
 * Supercharge PHP 8.1+ enums with Laravel-friendly utilities.
 *
 * @example enum DifficultyEnum: int
 *          {
 *              use \Lazerg\LaravelEnumPro\EnumPro;
 *
 *              case VERY_EASY = 1;
 *              case EASY = 2;
 *              case MEDIUM = 3;
 *              case STRONG = 4;
 *              case VERY_STRONG = 5;
 *          }
 *
 * @see EnumStaticCalls For accessing values: DifficultyEnum::MEDIUM() // 3
 * @see EnumNames       For accessing names: DifficultyEnum::namesToArray() // ['VERY_EASY', ...]
 * @see EnumValues      For accessing values: DifficultyEnum::valuesToArray() // [1, 2, 3, 4, 5]
 * @see EnumOptions     For form options: DifficultyEnum::optionsToArray() // [1 => 'Very Easy', ...]
 * @see EnumRandom      For random values: DifficultyEnum::randomFirst() // 3 (random)
 */
trait EnumPro
{
    use EnumValues,
        EnumNames,
        EnumRandom,
        EnumOptions,
        EnumStaticCalls;
}
