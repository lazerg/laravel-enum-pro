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
