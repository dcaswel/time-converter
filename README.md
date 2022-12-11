# Time Converter
A fluent PHP package for converting one unit of time into another unit of time.

Have you ever wanted an elegant way to get a certain amount of time worth of seconds? Let's say you're using a caching
system where you need to set the ttl in a number of seconds. Does this look familiar?
```php
//One day's worth of seconds
$ttl = 24 * 60 * 60;
```
Have you ever wanted to have something that was easier to read that is self documenting. That's where this package comes in.
Here's the equivalent line of code using Time Converter:
```php
use Dcaswel\TimeConverter\TimeConverter;

$ttl = TimeConverter::convert()->oneDay()->toSeconds();
```
Now, let's take a deeper look...

## Installation
```
composer require dcaswel/time-converter
```
## Usage
This package can be used for converting almost any length of time into any other length of time.

### Examples
```php
TimeConverter::convert()->days(5)->toSeconds(); //432000
TimeConverter::convert()->years(2)->toMonths(); //24
TimeConverter::convert()->weeks(20)->toDays(); //140
...
```
_Note: In order to keep the numbers whole, a month is considered 28 days._

You can also combine methods to get a more precise time:
```php
TimeConverter::convert()->weeks(2)->days(5)->toDays(); //19
```
For any method in the class, you can also call a singular version of it by prepending `one` to the beginning and removing
the `s`. 
For example: 
- `weeks()` can be `oneWeek()`
- `days()` can be `oneDay()`
- etc.

## API
```php
/**
 * Methods to set the time being converted 
 */
 
public function minutes(int $number)
public function hours(int $number)
public function days(int $number)
public function weeks(int $number)
public function months(int $number)
public function years(int $number)

/**
 * Methods to get the number you want to convert to
 */

public function toSeconds(): int|float
public function toMinutes(): int|float
public function toHours(): int|float
public function toDays(): int|float
public function toWeeks(): int|float
public function toMonths(): int|float
public function toYears(): int|float
```
