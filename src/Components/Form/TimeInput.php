<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML time input component.
 *
 * The time input component generates
 * an input element with type="time".
 *
 * @package RedSky\Html\Components\Form
 */
class TimeInput extends Input
{
    /**
     * Creates a new time input component.
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
     * Sets current time as value.
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
     * Sets minimum and maximum time.
     *
     * @param string $min
     * @param string $max
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
     * Restricts time to business hours.
     *
     * @param string $start
     * @param string $end
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
     * Restricts time to morning hours.
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
     * Restricts time to afternoon hours.
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
     * Restricts time to evening hours.
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