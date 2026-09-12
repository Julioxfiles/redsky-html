<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\TimeInput\UrlInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML time input component.
 *
 * The TimeInput component generates a semantic HTML
 * <input type="time"> element for selecting a time of day.
 *
 
 * @package RedSky\Html\Components\Form
 */
class TimeInput extends Input
{
    /**
     * Creates a new time input component.
     *
     * The input type is automatically set to `time`.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'time',
            $name
        );
    }

    /**
     * Sets the current system time as the input value.
     *
     * The value is generated using the `H:i` format,
     * which corresponds to the standard 24-hour time format
     * used by HTML time inputs.
     *
     * @return static
     */
    public function now(): static
    {
        $this->value(
            date('H:i')
        );

        return $this;
    }

    /**
     * Sets the minimum and maximum allowed time.
     *
     * @param string $min Minimum time in `HH:MM` format.
     * @param string $max Maximum time in `HH:MM` format.
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
     * Restricts the input to the specified business hours.
     *
     * By default, the allowed range is from 08:00 to 18:00.
     * Custom start and end times can be provided.
     *
     * @param string $start Start of the business-hours range.
     * @param string $end End of the business-hours range.
     *
     * @return static
     */
    public function businessHours(
        string $start = '08:00',
        string $end = '18:00'
    ): static {
        return $this
            ->min($start)
            ->max($end);
    }

    /**
     * Restricts the input to morning hours.
     *
     * The allowed range is from 06:00 to 12:00.
     *
     * @return static
     */
    public function morning(): static
    {
        return $this
            ->min('06:00')
            ->max('12:00');
    }

    /**
     * Restricts the input to afternoon hours.
     *
     * The allowed range is from 12:00 to 18:00.
     *
     * @return static
     */
    public function afternoon(): static
    {
        return $this
            ->min('12:00')
            ->max('18:00');
    }

    /**
     * Restricts the input to evening hours.
     *
     * The allowed range is from 18:00 to 23:59.
     *
     * @return static
     */
    public function evening(): static
    {
        return $this
            ->min('18:00')
            ->max('23:59');
    }
}