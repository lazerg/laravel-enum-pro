![wallpaper](./wallpaper/wallpaper.png)

![Version](https://img.shields.io/packagist/v/lazerg/laravel-enum-pro.svg?style=plastic)
![Downloads count](https://img.shields.io/packagist/dm/lazerg/laravel-enum-pro?style=plastic)
![Repository count](https://img.shields.io/github/repo-size/lazerg/laravel-enum-pro?style=plastic)
![Last commit](https://img.shields.io/github/last-commit/lazerg/laravel-enum-pro?style=plastic)
![Stars count](https://img.shields.io/packagist/stars/lazerg/laravel-enum-pro?style=plastic)

Finally, in [`php81`](https://php.watch/versions/8.1) has been added support
for [Enums](https://www.wikiwand.com/en/Enumerated_type). But as enums are new in php, we do not have some helpers to work with
that easily. So with our enum-pro package you have pretty more options for working with enums than built-in methods.

It is just trait `Lazerg\LaravelEnumPro\EnumPro` which must be added into enum. So it means it use built-in enum class
while enhancing it

### Installation

```bash
composer require lazerg/laravel-enum-pro
```

### Usage

Create a new enum class and use our trait on it.

```php
enum LevelTypes: int {
    use \Lazerg\LaravelEnumPro\EnumPro;

    case VERY_EASY = 1;
    case EASY = 2;
    case MEDIUM = 3;
    case STRONG = 4;
    case VERY_STRONG = 5
}
```

### Calling
With default functions, if you want to get value of case you should write `LevelTypes::VERY_EASY->value` which is little long.
With our package, you can get value of case, by just calling it statically
```php
LevelTypes::VERY_EASY() // 1
```


### Names
As you can see, names here `VERY_EASY`, `EASY`, `MEDIUM`, `STRONG`, `VERY_STRONG`.
To get all case names of enum. you can use these helper methods:

```php
LevelTypes::names();         // Collection: ['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG']
LevelTypes::namesToArray();  // Array: ['VERY_EASY', 'EASY', 'MEDIUM', 'STRONG', 'VERY_STRONG']
LevelTypes::namesToString(); // String: VERY_EASY, EASY, MEDIUM, STRONG, VERY_STRONG
```

### Values
As you can see, values here `1`, `2`, `3`, `4`, `5`.
**Common usage is for:** _validate incoming request data._

```php
LevelTypes::values();         // Collection: [1, 2, 3, 4, 5]
LevelTypes::valuesToArray();  // Array: [1, 2, 3, 4, 5]
LevelTypes::valuesToString(); // String: 1, 2, 3, 4, 5
```

### Randomize
Sometimes we need to get random value or values from enum.
This is mainly used in factories.

```php
LevelTypes::random(int $count = 1);      // Collection of $count random values
LevelTypes::randomArray(int $count = 1); // Array of $count random values
LevelTypes::randomFirst();               // One random value
```

### Options
While creating admin panel, we always change state of models.
And basically, it is recommended to save all state types in enum.
So in admin panel we need to get all options of enum for select.
That's why we have `options()` method.

```php
LevelTypes::options(); // Return collection of selectable options
LevelTypes::optionsToArray(); // Return array of selectable options
```

**Example of options:**

```bash
Illuminate\Support\Collection {#7777
    #items: array:5 [
        1 => "Very Easy"
        2 => "Easy"
        3 => "Medium"
        4 => "Strong"
        5 => "Very Strong"
    ]
}
```

#### Selections
Sometimes in admin panel, it is easier to give options as array of objects.
For such needs we have also `selections()` method

```php
LevelTypes::selections();
LevelTypes::selectionsToArray();
```

**Example of selections:**

```bash
Illuminate\Support\Collection {#7777
    #items: array:5 [
        0 => [
            "value"   => "1",
            "display" => "Very Easy",
        ],
        1 => [
            "value"   => "2",
            "display" => "Easy",
        ],
        2 => [
            "value"   => "3",
            "display" => "Medium",
        ],
        3 => [
            "value"   => "4",
            "display" => "Strong",
        ],
        4 => [
            "value"   => "5",
            "display" => "Very Strong",
        ],
    ]
}
```

### Testing
To run test
```bash
./vendor/bin/pest
```
