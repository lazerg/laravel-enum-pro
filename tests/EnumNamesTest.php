<?php

test('Get name of enums as collection', function () {
    expect(LevelTypes::names())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

test('Get name of enums', function () {
    expect(LevelTypes::namesToArray())
        ->toBe([
            0 => 'VERY_EASY',
            1 => 'EASY',
            2 => 'MEDIUM',
            3 => 'STRONG',
            4 => 'VERY_STRONG'
        ]);
});

test('Get name of enums as string', function () {
    expect(LevelTypes::names()->implode(', '))
        ->toBe('VERY_EASY, EASY, MEDIUM, STRONG, VERY_STRONG');
});

test('Get name of enum', function () {
    expect(LevelTypes::nameOf(LevelTypes::MEDIUM()))
        ->toBe('MEDIUM');
});