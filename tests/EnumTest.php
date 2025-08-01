<?php
declare(strict_types=1);

/**
 * @noinspection PhpIllegalPsrClassPathInspection
 *
 * @method static int VERY_EASY()
 * @method static int EASY()
 * @method static int MEDIUM()
 * @method static int HARD()
 * @method static int VERY_STRONG()
 */
enum LevelTypes: int
{
    use \Lazerg\LaravelEnumPro\EnumPro;

    case VERY_EASY = 1;
    case EASY = 2;
    case MEDIUM = 3;
    case STRONG = 4;
    case VERY_STRONG = 5;
}
