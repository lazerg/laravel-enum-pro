<?php
declare(strict_types=1);

namespace Lazerg\LaravelEnumPro;

use Exception;
use UnitEnum;

trait EnumStaticCalls
{
    /**
     * @return int|string
     */
    public function __invoke(): int|string
    {
        /** @type UnitEnum $this */
        return $this->value ?? $this->name;
    }

    /**
     * @throws Exception
     */
    public static function __callStatic(string $name, array $arguments): int|string
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case->value;
            }
        }

        throw new Exception("Case with name $name does not exist");
    }
}
