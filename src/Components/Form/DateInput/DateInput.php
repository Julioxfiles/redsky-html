<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\DataInput;

use RedSky\Html\Components\Form\Input\Input;

/**
 * The DateInput component generates a native HTML
 * <input type="date"> element that allows users to
 * select a date.
 *
 * The date value submitted by the browser follows the
 * ISO date format:
 *
 *     YYYY-MM-DD
 *
 * DateInput provides methods for setting the current date
 * and restricting the selectable date range.
 *
 * @package RedSky\Html\Components\Form
 */
class DateInput extends Input
{
    /**
     * Creates a new date input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'date',
            $name
        );
    }


    /**
     * Sets the current date as the input value.
     *
     * @return static
     */
    public function today(): static
    {
        $this->value(
            date('Y-m-d')
        );

        return $this;
    }


    /**
     * Restricts selectable dates to today or later.
     *
     * @return static
     */
    public function minimumToday(): static
    {
        $this->min(
            date('Y-m-d')
        );

        return $this;
    }


    /**
     * Restricts selectable dates to today or earlier.
     *
     * @return static
     */
    public function maximumToday(): static
    {
        $this->max(
            date('Y-m-d')
        );

        return $this;
    }


    /**
     * Sets the minimum and maximum selectable dates.
     *
     * @param string $min Minimum date in YYYY-MM-DD format.
     * @param string $max Maximum date in YYYY-MM-DD format.
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
     * Allows only dates before or on the current date.
     *
     * @return static
     */
    public function past(): static
    {
        return $this->maximumToday();
    }


    /**
     * Allows only dates from the current date onwards.
     *
     * @return static
     */
    public function future(): static
    {
        return $this->minimumToday();
    }
}