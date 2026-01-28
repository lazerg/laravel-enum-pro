<?php

test('Get value via static call', function () {
    expect(LevelTypes::VERY_EASY())->toBe(1);
    expect(LevelTypes::MEDIUM())->toBe(3);
    expect(LevelTypes::VERY_STRONG())->toBe(5);
});

test('Static call throws exception for non-existent case', function () {
    LevelTypes::NON_EXISTENT();
})->throws(Exception::class, 'Case with name NON_EXISTENT does not exist');

test('Invoke returns value', function () {
    $enum = LevelTypes::MEDIUM;

    expect($enum())->toBe(3);
});