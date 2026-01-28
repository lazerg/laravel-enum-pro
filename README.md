# Laravel Enum Pro

![Laravel Enum Pro](./wallpaper/wallpaper.png)

[![Latest Version](https://img.shields.io/packagist/v/lazerg/laravel-enum-pro.svg?style=flat-square)](https://packagist.org/packages/lazerg/laravel-enum-pro)
[![PHP Version](https://img.shields.io/packagist/php-v/lazerg/laravel-enum-pro?style=flat-square)](https://packagist.org/packages/lazerg/laravel-enum-pro)
[![Downloads](https://img.shields.io/packagist/dm/lazerg/laravel-enum-pro.svg?style=flat-square)](https://packagist.org/packages/lazerg/laravel-enum-pro)
[![Total Downloads](https://img.shields.io/packagist/dt/lazerg/laravel-enum-pro?style=flat-square)](https://packagist.org/packages/lazerg/laravel-enum-pro)
[![Packagist Stars](https://img.shields.io/packagist/stars/lazerg/laravel-enum-pro?style=flat-square)](https://packagist.org/packages/lazerg/laravel-enum-pro)

A powerful trait that supercharges PHP 8.1+ enums with Laravel-friendly utilities. Get values, names, random cases, and form-ready options with a clean, fluent API.

## Installation

```bash
composer require lazerg/laravel-enum-pro
```

## Enum Example

```php
enum DifficultyEnum: int
{
    use \Lazerg\LaravelEnumPro\EnumPro;

    case VERY_EASY = 1;
    case EASY = 2;
    case MEDIUM = 3;
    case STRONG = 4;
    case VERY_STRONG = 5;
}
```

## Accessing Value

```php
// 1
DifficultyEnum::VERY_EASY();

// 3
DifficultyEnum::MEDIUM();

// 5
DifficultyEnum::VERY_STRONG();

// 3
$enum = DifficultyEnum::MEDIUM;
$enum();
```

## Accessing Name

```php
// ['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG']
DifficultyEnum::namesToArray();

// 'VERY_EASY, EASY, MEDIUM, STRONG, VERY_STRONG'
DifficultyEnum::namesToString();

// Collection(['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG'])
DifficultyEnum::names();

// 'MEDIUM'
DifficultyEnum::nameOf(3);
```

## Accessing Values

```php
// [1, 2, 3, 4, 5]
DifficultyEnum::valuesToArray();

// '1,2,3,4,5'
DifficultyEnum::valuesToString();

// Collection([1, 2, 3, 4, 5])
DifficultyEnum::values();

// 1
DifficultyEnum::valueOf('VERY_EASY');

// 3 (case-insensitive)
DifficultyEnum::valueOf('medium');

// 5 (spaces converted to underscores)
DifficultyEnum::valueOf('Very strong');
```

## Accessing Options

```php
// [1 => 'Very Easy', 2 => 'Easy', 3 => 'Medium', 4 => 'Strong', 5 => 'Very Strong']
DifficultyEnum::optionsToArray();

// Collection([1 => 'Very Easy', 2 => 'Easy', 3 => 'Medium', 4 => 'Strong', 5 => 'Very Strong'])
DifficultyEnum::options();

// 'Very Strong'
DifficultyEnum::getOption(5);

// ['Medium', 'Very Strong']
DifficultyEnum::getOptions([3, 5]);

// [['value' => 1, 'display' => 'Very Easy'], ['value' => 2, 'display' => 'Easy'], ...]
DifficultyEnum::selectionsToArray();

// Collection([['value' => 1, 'display' => 'Very Easy'], ['value' => 2, 'display' => 'Easy'], ...])
DifficultyEnum::selections();
```

## Accessing Random Value

```php
// [3, 1] (random values)
DifficultyEnum::randomArray(2);

// 4 (single random value)
DifficultyEnum::randomFirst();

// Collection([2, 5, 1]) (random values)
DifficultyEnum::random(3);
```

## Testing

```bash
./vendor/bin/pest
```

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).
