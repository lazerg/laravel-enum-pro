<?php

use Tests\DifficultyEnum;

it('can get enum value using static method call with case name', function () {
    expect(DifficultyEnum::VERY_EASY())->toBe(1)
        ->and(DifficultyEnum::MEDIUM())->toBe(3)
        ->and(DifficultyEnum::VERY_STRONG())->toBe(5);
});

it('throws exception when calling non-existent case as static method', function () {
    DifficultyEnum::NON_EXISTENT();
})->throws(
    \Lazerg\LaravelEnumPro\Exceptions\UndefinedCaseException::class,
    'Case with name NON_EXISTENT does not exist'
);

it('can get enum value by invoking the enum instance', function () {
    $enum = DifficultyEnum::MEDIUM;

    expect($enum())->toBe(3);
});
