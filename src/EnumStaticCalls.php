<?php

namespace Lazerg\LaravelEnumPro;

use Lazerg\LaravelEnumPro\Exceptions\UndefinedCaseException;

trait EnumStaticCalls
{
    /**
     * Get the enum value by invoking the instance.
     *
     * @return int|string
     * @example $enum = DifficultyEnum::MEDIUM;
     *          $enum();
     *          // 3
     *
     */
    public function __invoke(): int|string
    {
        return $this->value ?? $this->name;
    }

    /**
     * Get the enum value using static method call with case name.
     *
     * @param string $name
     * @param array $arguments
     * @return int|string
     * @throws UndefinedCaseException When case name does not exist
     * @example DifficultyEnum::VERY_EASY()
     *          // 1
     *
     * @example DifficultyEnum::MEDIUM()
     *          // 3
     *
     * @example DifficultyEnum::VERY_STRONG()
     *          // 5
     *
     */
    public static function __callStatic(string $name, array $arguments): int|string
    {
        return array_column(self::cases(), 'value', 'name')[$name]
            ?? throw new UndefinedCaseException($name);
    }
}
