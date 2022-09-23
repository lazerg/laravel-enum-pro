<?php

test('Get values of enum as collection', function () {
    expect(LevelTypes::values())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

test('Get values of enum as string', function () {
    expect(LevelTypes::valuesToString())
        ->toBe('1,2,3,4,5');
});

test('Get values of enum as array', function () {
    expect(LevelTypes::valuesToArray())
        ->toBe([1, 2, 3, 4, 5]);
});