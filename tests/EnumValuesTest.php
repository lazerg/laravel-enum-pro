<?php

use Tests\DifficultyEnum;

it('can get all enum values as a collection', function () {
    expect(DifficultyEnum::values())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

it('can get all enum values as an array', function () {
    expect(DifficultyEnum::valuesToArray())
        ->toBe([1, 2, 3, 4, 5]);
});

it('can get all enum values as a comma-separated string', function () {
    expect(DifficultyEnum::valuesToString())
        ->toBe('1,2,3,4,5');
});

it('can get enum value by its name with case-insensitive lookup', function () {
    expect(DifficultyEnum::valueOf('VERY_EASY'))->toBe(1)
        ->and(DifficultyEnum::valueOf('medium'))->toBe(3)
        ->and(DifficultyEnum::valueOf('Very strong'))->toBe(5)
        ->and(DifficultyEnum::valueOf('Not found'))->toBeNull();
});
