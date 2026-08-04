<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML date input component.
 *
 * The date input component generates
 * an input element with type="date".
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
     * Sets current date as value.
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
     * Restricts dates from today onwards.
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
     * Restricts dates up to today.
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
     * Sets minimum and maximum dates.
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
     * Allows only past dates.
     *
     * @return static
     */
    public function past(): static
    {
        return $this->maximumToday();
    }


    /**
     * Allows only future dates.
     *
     * @return static
     */
    public function future(): static
    {
        return $this->minimumToday();
    }
}