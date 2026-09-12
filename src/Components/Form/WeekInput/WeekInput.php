<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\WeekInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * WeekInput component.
 *
 * Generates a native HTML <input type="week"> element
 * for selecting a specific week and year.
 *
 * The value follows the ISO week date format:
 *
 *     YYYY-Www
 *
 * WeekInput provides methods for setting the current week,
 * defining minimum and maximum weeks, and restricting the
 * selectable range to past, future, or current-year weeks.
 *
 * Inherits the standard input component functionality for
 * HTML attributes, CSS classes, inline styles, and values.
  *
 * @package RedSky\Html\Components\Form
 */
class WeekInput extends Input
{
    /**
     * Creates a new week input component.
     *
     * The input type is automatically set to "week".
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'week',
            $name
        );
    }


    /**
     * Sets the current ISO week as the input value.
     *
     * The generated value follows the ISO week date format:
     *
     *     YYYY-Www
     *
     * For example:
     *
     *     2026-W34
     *
     * @return static
     */
    public function current(): static
    {
        $this->value(
            date('o-\WW')
        );

        return $this;
    }


    /**
     * Sets the minimum and maximum selectable week.
     *
     * The supplied values must use the ISO week date format:
     *
     *     YYYY-Www
     *
     * @param string $min Minimum selectable week.
     * @param string $max Maximum selectable week.
     *
     * @return static
     */
    public function between(
        string $min,
        string $max
    ): static {
        return $this
            ->min($min)
            ->max($max);
    }


    /**
     * Restricts selection to the current week and future weeks.
     *
     * The current ISO week becomes the minimum selectable week.
     *
     * @return static
     */
    public function future(): static
    {
        $this->min(
            date('o-\WW')
        );

        return $this;
    }


    /**
     * Restricts selection to the current week and previous weeks.
     *
     * The current ISO week becomes the maximum selectable week.
     *
     * @return static
     */
    public function past(): static
    {
        $this->max(
            date('o-\WW')
        );

        return $this;
    }


    /**
     * Restricts selection to the current year's week range.
     *
     * The range starts at ISO week 01 and ends at ISO week 52.
     *
     * @return static
     */
    public function currentYear(): static
    {
        $year = date('o');

        return $this
            ->min($year . '-W01')
            ->max($year . '-W52');
    }
}

