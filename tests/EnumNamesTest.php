<?php

use Tests\DifficultyEnum;

it('can get all enum names as a collection', function () {
    expect(DifficultyEnum::names())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

it('can get all enum names as an array', function () {
    expect(DifficultyEnum::namesToArray())
        ->toBe(['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG']);
});

it('can get all enum names as a comma-separated string', function () {
    expect(DifficultyEnum::namesToString())
        ->toBe('VERY_EASY, EASY, MEDIUM, STRONG, VERY_STRONG');
});

it('can get enum name by its value', function () {
    expect(DifficultyEnum::nameOf(DifficultyEnum::MEDIUM()))
        ->toBe('MEDIUM');
});
