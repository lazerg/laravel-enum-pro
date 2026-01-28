# Laravel Enum Pro - Development Guide

## Coding Rules

### Performance First
- Use native PHP functions (`array_column`, `array_map`, `array_combine`, `array_filter`, `array_keys`, `array_values`, `implode`, etc.) for better performance
- Only use `Collection` when the method's return type requires it
- Base methods should return arrays, Collection methods should wrap them with `collect()`

### Method Organization
Order methods from base (native PHP) to derived (Collection):
1. `toArray()` methods first - use native PHP functions
2. `toString()` methods - use native PHP with array methods
3. Collection methods - wrap array methods with `collect()`
4. Lookup methods last

### Example Pattern
```php
// 1. Base method - native PHP
public static function namesToArray(): array
{
    return array_column(self::cases(), 'name');
}

// 2. String method - uses base
public static function namesToString(string $separator = ', '): string
{
    return implode($separator, self::namesToArray());
}

// 3. Collection method - wraps base
public static function names(): Collection
{
    return collect(self::namesToArray());
}
```

## Testing Rules

### Use Pest with `it()` syntax
- Use `it()` instead of `test()` for BDD-style readability
- Start descriptions with "can" for success cases: `it('can get...')`
- Start descriptions with "throws" for exception cases: `it('throws exception when...')`

### Test Naming Convention
```php
// Success cases - describe capability
it('can get all enum names as a collection', function () { ... });
it('can get enum value by its name with case-insensitive lookup', function () { ... });

// Exception cases - describe failure condition
it('throws exception when requesting more random values than available', function () { ... });
it('throws exception when calling non-existent case as static method', function () { ... });
```

### Best Practices
- Chain expectations with `->and()` for multiple assertions
- Keep test descriptions clear and specific
- Describe what the method does, not how it does it
- Include context (e.g., "as a collection", "as an array", "by its value")
- Use `use Tests\DifficultyEnum;` at top of test files

## Project Structure

```
src/
├── EnumPro.php          # Main trait (combines all)
├── EnumNames.php        # Name methods
├── EnumValues.php       # Value methods
├── EnumOptions.php      # Options/selections for forms
├── EnumRandom.php       # Random selection
├── EnumStaticCalls.php  # Magic methods
└── Exceptions/
    ├── UndefinedCaseException.php
    └── TooManyRandomValuesException.php

tests/
├── DifficultyEnum.php   # Test enum fixture
├── EnumNamesTest.php
├── EnumValuesTest.php
├── EnumOptionsTest.php
├── EnumRandomTest.php
└── EnumStaticCallsTest.php
```

## Testing

```bash
./vendor/bin/pest
```
