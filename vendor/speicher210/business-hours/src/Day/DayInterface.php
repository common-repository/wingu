<?php

/**
 * This file is part of Business-hours.
 * Copyright (c) 2015 - 2016 original code: Florian Voutzinos <florian@voutzinos.com
 * Copyright (c) 2015 - 2017 additions and changes: Speicher 210 GmbH
 * For the full copyright and license information, please view the LICENSE * file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Speicher210\BusinessHours\Day;

use Speicher210\BusinessHours\Day\Time\Time;
use Speicher210\BusinessHours\Day\Time\TimeIntervalInterface;

/**
 * Day interface.
 */
interface DayInterface extends \JsonSerializable
{
    const WEEK_DAY_MONDAY = 1;
    const WEEK_DAY_TUESDAY = 2;
    const WEEK_DAY_WEDNESDAY = 3;
    const WEEK_DAY_THURSDAY = 4;
    const WEEK_DAY_FRIDAY = 5;
    const WEEK_DAY_SATURDAY = 6;
    const WEEK_DAY_SUNDAY = 7;

    /**
     * Gets the day of week.
     *
     * @return integer
     */
    public function getDayOfWeek(): int;

    /**
     * Get the name of the day.
     *
     * @return string
     */
    public function getDayOfWeekName(): string;

    /**
     * Get the opening hours intervals.
     *
     * @return TimeIntervalInterface[]
     */
    public function getOpeningHoursIntervals(): array;

    /**
     * Gets the opening time of the day.
     *
     * @return Time
     */
    public function getOpeningTime(): Time;

    /**
     * Gets the closing time of the day.
     *
     * @return Time
     */
    public function getClosingTime(): Time;

    /**
     * Get the closest opening hours interval for the given time (including it or in the past).
     *
     * @param Time $time The time.
     * @return TimeIntervalInterface|null
     */
    public function getClosestPreviousOpeningHoursInterval(Time $time);

    /**
     * Get the closest opening hours interval for the given time (including it or in the future).
     *
     * @param Time $time The time.
     * @return TimeIntervalInterface|null
     */
    public function getClosestNextOpeningHoursInterval(Time $time);

    /**
     * Get the previous opening hours interval excluding current (if inside of given time).
     *
     * @param Time $time The time.
     * @return TimeIntervalInterface|null
     */
    public function getPreviousOpeningHoursInterval(Time $time);

    /**
     * Get the next opening hours interval excluding current (if inside of given time).
     *
     * @param Time $time The time.
     * @return TimeIntervalInterface|null
     */
    public function getNextOpeningHoursInterval(Time $time);

    /**
     * Checks if the given time is within opening hours of the day.
     *
     * @param Time $time The time
     * @return boolean
     */
    public function isWithinOpeningHours(Time $time): bool;
}
