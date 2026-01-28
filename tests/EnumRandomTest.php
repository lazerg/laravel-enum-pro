<?php

use Tests\DifficultyEnum;

it('can get random enum values as a collection', function () {
    expect(DifficultyEnum::random())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

it('can get a specific count of random enum values', function () {
    expect(DifficultyEnum::random(3))
        ->toHaveCount(3);
});

it('can get a single random enum value', function () {
    expect(DifficultyEnum::randomFirst())
        ->toBeIn([1, 2, 3, 4, 5]);
});

it('can get random enum values as an array', function () {
    expect(DifficultyEnum::randomArray(2))
        ->toBeArray()
        ->toHaveCount(2);
});

it('throws exception when requesting more random values than available', function () {
    DifficultyEnum::random(10);
})->throws(\Lazerg\LaravelEnumPro\Exceptions\TooManyRandomValuesException::class);
