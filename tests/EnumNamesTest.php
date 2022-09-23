<?php

use Lazerg\LaravelEnumPro\EnumPro;

test('Get key name from value', function () {
    enum TestEnum: int {
        use EnumPro;

        CASE A = 1;
        CASE B = 2;
        CASE C = 3;
        CASE D = 4;
    }


    expect(TestEnum::nameOf(1))->toBe('A');
    expect(TestEnum::nameOf(2))->toBe('B');
    expect(TestEnum::nameOf(3))->toBe('C');
});
