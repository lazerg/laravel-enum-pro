<?php

use Tests\DifficultyEnum;

it('can get all enum options as a collection', function () {
    expect(DifficultyEnum::options())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

it('can get all enum options as key-value array with formatted labels', function () {
    expect(DifficultyEnum::optionsToArray())->toBe([
        1 => 'Very Easy',
        2 => 'Easy',
        3 => 'Medium',
        4 => 'Strong',
        5 => 'Very Strong',
    ]);
});

it('can get a single option label by its value', function () {
    expect(DifficultyEnum::getOption(DifficultyEnum::VERY_STRONG()))
        ->toBe('Very Strong');
});

it('can get multiple option labels by their values', function () {
    expect(DifficultyEnum::getOptions([DifficultyEnum::MEDIUM(), DifficultyEnum::VERY_STRONG()]))
        ->toBe(['Medium', 'Very Strong']);
});

it('can get all enum selections as a collection for form inputs', function () {
    expect(DifficultyEnum::selections())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

it('can get all enum selections as array with value and display keys', function () {
    expect(DifficultyEnum::selectionsToArray())->toBe([
        ['value' => 1, 'display' => 'Very Easy'],
        ['value' => 2, 'display' => 'Easy'],
        ['value' => 3, 'display' => 'Medium'],
        ['value' => 4, 'display' => 'Strong'],
        ['value' => 5, 'display' => 'Very Strong'],
    ]);
});
