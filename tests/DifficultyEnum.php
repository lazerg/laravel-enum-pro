<?php

namespace Tests;

use Lazerg\LaravelEnumPro\EnumPro;

enum DifficultyEnum: int
{
    use EnumPro;

    case VERY_EASY = 1;
    case EASY = 2;
    case MEDIUM = 3;
    case STRONG = 4;
    case VERY_STRONG = 5;
}
