<?php

test('Get random values as collection', function () {
    expect(LevelTypes::random())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

test('Get random values with count', function () {
    expect(LevelTypes::random(3))
        ->toHaveCount(3);
});

test('Get random first value', function () {
    expect(LevelTypes::randomFirst())
        ->toBeIn([1, 2, 3, 4, 5]);
});

test('Get random values as array', function () {
    $random = LevelTypes::randomArray(2);

    expect($random)
        ->toBeArray()
        ->toHaveCount(2);
});

test('Random throws exception when count exceeds enum values', function () {
    LevelTypes::random(10);
})->throws(InvalidArgumentException::class, 'Count of random values is greater than count of enum values');