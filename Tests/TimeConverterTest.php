<?php

namespace Tests\Unit;

use BadMethodCallException;
use Dcaswel\TimeConverter\TimeConverter;

it('can convert minutes to seconds', function() {
    expect(TimeConverter::convert()->minutes(2)->toSeconds())->toBe(120);
});

it('can convert one minute to seconds', function () {
    expect(TimeConverter::convert()->oneMinute()->toSeconds())->toBe(60);
});

it('can convert hours to seconds', function () {
    expect(TimeConverter::convert()->hours(2)->toSeconds())->toBe(7200);
});

it('can covert one hour to seconds', function () {
    expect(TimeConverter::convert()->oneHour()->toSeconds())->toBe(3600);
});

it('can convert days to seconds', function () {
    expect(TimeConverter::convert()->days(2)->toSeconds())->toBe(172800);
});

it('can convert one day to seconds', function () {
    expect(TimeConverter::convert()->oneDay()->toSeconds())->toBe(86400);
});

it('can convert weeks to seconds', function () {
    expect(TimeConverter::convert()->weeks(2)->toSeconds())->toBe(1209600);
});

it('can convert one week to seconds', function () {
    expect(TimeConverter::convert()->oneWeek()->toSeconds())->toBe(604800);
});

it('can convert months to seconds', function () {
    expect(TimeConverter::convert()->months(2)->toSeconds())->toBe(4838400);
});

it('can convert one month to seconds', function () {
    expect(TimeConverter::convert()->oneMonth()->toSeconds())->toBe(2419200);
});

it('can convert years to seconds', function () {
    expect(TimeConverter::convert()->years(2)->toSeconds())->toBe(58060800);
});

it('can convert one year to seconds', function () {
    expect(TimeConverter::convert()->oneYear()->toSeconds())->toBe(29030400);
});

it('can convert to minutes', function () {
    expect(TimeConverter::convert()->hours(2)->toMinutes())->toBe(120);
});

it('can convert to hours', function () {
    expect(TimeConverter::convert()->days(2)->toHours())->toBe(48);
});

it('can convert to days', function () {
    expect(TimeConverter::convert()->weeks(2)->toDays())->toBe(14);
});

it('can convert to weeks', function () {
    expect(TimeConverter::convert()->months(2)->toWeeks())->toBe(8);
});

it('can convert to months', function () {
    expect(TimeConverter::convert()->years(2)->toMonths())->toBe(24);
});

it('can convert to years', function () {
    expect(TimeConverter::convert()->months(24)->toYears())->toBe(2);
});

it('can convert a time from multiple methods', function () {
    expect(TimeConverter::convert()->weeks(4)->days(7)->toWeeks())->toBe(5);
});

test('dynamic calls can only use one', function () {
    TimeConverter::convert()->twoDays();
})->throws(BadMethodCallException::class);

test('dynamic calls must use a method that exists', function () {
    TimeConverter::convert()->oneStarDate();
})->throws(BadMethodCallException::class);
