# PHP Enum enhanced

![Version](https://img.shields.io/packagist/v/lazerg/laravel-enum-pro.svg?style=plastic)
![Downloads count](https://img.shields.io/packagist/dm/lazerg/laravel-enum-pro?style=plastic)
![Repository count](https://img.shields.io/github/repo-size/lazerg/laravel-enum-pro?style=plastic)
![Last commit](https://img.shields.io/github/last-commit/lazerg/laravel-enum-pro?style=plastic)
![Stars count](https://img.shields.io/packagist/stars/lazerg/laravel-enum-pro?style=plastic)

### What are ENUMs?

In computer programming, an enumerated type is a data type consisting of a set of named values called elements, members, numeral, or enumerators of the type. The enumerator names are usually identifiers that behave as constants in the language. An enumerated type can be seen as a degenerate tagged union of unit type.

### PHP 8.1 includes Enums

PHP 8.1 adds support for Enumerations. An Enumeration, or an Enum for short, is an enumerated type that has a fixed number of possible values.

Enums can contain methods. They also support standard method visibility modifiers as well as static methods.

Here is simple example of enums in PHP

#### Declaration
```php
enum PaymentStatusTypes: int {
    case PENDING = 1;
    case COMPLETE = 2;
    case REFUND = 3;
    case FAILED = 4;
    case ABANDONED = 5;
    case REVOKED = 6;
    case PREAPPROVED = 7;
    case CANCELLED = 8;
}
```

#### Usage

```php
PaymentStatusTypes::COMPLETE->value // 1
PaymentStatusTypes::COMPLETE->name // PENDING

PaymentStatusTypes::from(1) // PaymentStatusTypes (return case with value 1)
PaymentStatusTypes::cases() // PaymentStatusTypes[] (return all cases)
```

In contrast to using special strings or numbers internally (i.e. magic numbers) to store and work with parameters, Enums make the application code more readable and avoids unexpected application state.

## Why we need Enum PRO package?

The thing is that, php built-in enum function is very limited as you have seen before.
What if you want to return all values of all cases? Or all case names? That's why we developed enum-pro trait to
enhance built-in functionality of enum

### Installation

```bash
composer require lazerg/laravel-enum-pro
```


### Usage
First include EnumPro trait `use Lazerg\LaravelEnumPro\EnumPro;`

### Values

```php
PaymentStatusTypes::values()         // Return all case values as Collection
PaymentStatusTypes::valuesToArray()  // Return all case values as array
PaymentStatusTypes::valuesToString() // Return all case values as string seperated by comma

Illuminate\Support\Collection {#7777
  #items: array:8 [
    0 => 1
    1 => 2
    2 => 3
    3 => 4
    4 => 5
    5 => 6
    6 => 7
    7 => 8
  ]
}
```

### Names

```php
PaymentStatusTypes::names()         // Return all case names as Collection
PaymentStatusTypes::namesToArray()  // Return all case names as array
PaymentStatusTypes::namesToString() // Return all case names as string separated by comma

Illuminate\Support\Collection {#777
  #items: array:8 [
    0 => "PENDING"
    1 => "COMPLETE"
    2 => "REFUND"
    3 => "FAILED"
    4 => "ABANDONED"
    5 => "REVOKED"
    6 => "PREAPPROVED"
    7 => "CANCELLED"
  ]
}

```

### Options
```php
PaymentStatusTypes::options()        // Return all cases as Collection options (very handy for admin panels, veryyyy...)
PaymentStatusTypes::optionsToArray() // Return all cases as array options (very handy for admin panels, veryyyy...)

Illuminate\Support\Collection {#7777
  #items: array:8 [
    1 => "Pending"
    2 => "Complete"
    3 => "Refund"
    4 => "Failed"
    5 => "Abandoned"
    6 => "Revoked"
    7 => "Preapproved"
    8 => "Cancelled"
  ]
}

```

### Random

```php
PaymentStatusTypes::random(int $count)      // Return $count random values as Collection
PaymentStatusTypes::randomArray(int $count) // Return $count random values as array
PaymentStatusTypes::randomFirst()           // Return one random value
```
