<?php
declare(strict_types=1);

test('Get options of enum as collection', function () {
    expect(LevelTypes::options())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

test('Get options of enum as array', function () {
    expect(LevelTypes::optionsToArray())->tobe([
        1 => "Very Easy",
        2 => "Easy",
        3 => "Medium",
        4 => "Strong",
        5 => "Very Strong"
    ]);
});

test('Get a single options of enum', function () {
    expect(LevelTypes::getOption(LevelTypes::VERY_STRONG()))
        ->toBe('Very Strong');
});

test('Get multiple options of enum', function () {
    $options = LevelTypes::getOptions([
        LevelTypes::MEDIUM(),
        LevelTypes::VERY_STRONG()
    ]);

    expect($options->toArray())
        ->toBe([
            "Medium",
            "Very Strong"
        ]);
});

test('Get selection of enums as collection', function () {
    expect(LevelTypes::selections())
        ->toBeInstanceOf(\Illuminate\Support\Collection::class);
});

test('Get selection of enums as array', function () {
    expect(LevelTypes::selectionsToArray())->tobe([[
        "value"   => 1,
        "display" => "Very Easy"
    ], [
        "value"   => 2,
        "display" => "Easy"
    ], [
        "value"   => 3,
        "display" => "Medium"
    ], [
        "value"   => 4,
        "display" => "Strong"
    ], [
        "value"   => 5,
        "display" => "Very Strong"
    ]]);
});