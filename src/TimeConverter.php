<?php

namespace Dcaswel\TimeConverter;

use BadMethodCallException;

/**
 * @method self oneMinute()
 * @method self oneHour()
 * @method self oneDay()
 * @method self oneWeek()
 * @method self oneMonth()
 * @method self oneYear()
 */
class TimeConverter
{
    public const MONTHS_IN_YEAR = 12;
    public const DAYS_IN_MONTH = 28;
    public const DAYS_IN_WEEK = 7;
    public const HOURS_IN_DAY = 24;
    public const MINUTES_IN_HOUR = 60;
    public const SECONDS_IN_MINUTE = 60;

    private int $timeInSeconds = 0;

    /**
     * Factory method to create a converter instance
     *
     * @return self
     */
    public static function convert(): self
    {
        return new self();
    }

    /**
     * Set the number of minutes being converted
     *
     * @param int $number The number of minutes
     * @return $this
     */
    public function minutes(int $number): self
    {
        $this->timeInSeconds += $number * self::SECONDS_IN_MINUTE;
        return $this;
    }

    /**
     * Set the number of hours to convert
     *
     * @param int $number The number of hours
     * @return $this
     */
    public function hours(int $number): self
    {
        return $this->minutes($number * self::MINUTES_IN_HOUR);
    }

    /**
     * Set the number of days to convert
     *
     * @param int $number The number of days
     * @return $this
     */
    public function days(int $number): self
    {
        return $this->hours($number * self::HOURS_IN_DAY);
    }

    /**
     * Set the number of weeks to convert
     *
     * @param int $number The number of weeks
     * @return $this
     */
    public function weeks(int $number): self
    {
        return $this->days($number * self::DAYS_IN_WEEK);
    }

    /**
     * Set the number of months to convert
     *
     * @param int $number The number of months
     * @return $this
     */
    public function months(int $number): self
    {
        return $this->days($number * self::DAYS_IN_MONTH);
    }

    /**
     * Set the number of years to convert
     *
     * @param int $number The number of years
     * @return $this
     */
    public function years(int $number): self
    {
        return $this->months($number * self::MONTHS_IN_YEAR);
    }

    /**
     * Get the current number in seconds
     *
     * @return int|float
     */
    public function toSeconds(): int|float
    {
        return $this->timeInSeconds;
    }

    /**
     * Get the current number in minutes
     *
     * @return int|float
     */
    public function toMinutes(): int|float
    {
        return $this->toSeconds() / self::SECONDS_IN_MINUTE;
    }

    /**
     * Get the current number in hours
     *
     * @return int|float
     */
    public function toHours(): int|float
    {
        return $this->toMinutes() / self::MINUTES_IN_HOUR;
    }

    /**
     * Get the current number in days
     *
     * @return int|float
     */
    public function toDays(): int|float
    {
        return $this->toHours() / self::HOURS_IN_DAY;
    }

    /**
     * Get the current number in weeks
     *
     * @return int|float
     */
    public function toWeeks(): int|float
    {
        return $this->toDays() / self::DAYS_IN_WEEK;
    }

    /**
     * Get the current number in months
     *
     * @return int|float
     */
    public function toMonths(): int|float
    {
        return $this->toDays() / self::DAYS_IN_MONTH;
    }

    /**
     * Get the current number in years
     *
     * @return int|float
     */
    public function toYears(): int|float
    {
        return $this->toMonths() / self::MONTHS_IN_YEAR;
    }

    /**
     * This allows the user to be able to call the singular version of any of the "set" methods in the class.
     * Ex: oneDay() sets the time to one day
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call(string $name, array $arguments)
    {
        if (!str_starts_with($name, 'one')) {
            throw new BadMethodCallException();
        }
        $method = substr($name, 3) . 's';
        if (!method_exists($this, $method)) {
            throw new BadMethodCallException();
        }

        return $this->$method(1);
    }
}
