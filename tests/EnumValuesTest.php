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

test('Get value of enum', function () {
    expect(LevelTypes::valueOf('VERY_EASY'))
        ->toBe(1);

    expect(LevelTypes::valueOf('medium'))
        ->toBe(3);

    expect(LevelTypes::valueOf('Very strong'))
        ->toBe(5);
});