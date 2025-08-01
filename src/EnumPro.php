<?php
declare(strict_types=1);

namespace Lazerg\LaravelEnumPro;

trait EnumPro
{
    use EnumValues,
        EnumNames,
        EnumRandom,
        EnumOptions,
        EnumStaticCalls;
}
