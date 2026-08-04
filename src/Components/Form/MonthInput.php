<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML month input component.
 *
 * The month input component generates
 * an input element with type="month".
 *
 * @package RedSky\Html\Components\Form
 */
class MonthInput extends Input
{
    /**
     * Creates a new month input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'month',
            $name
        );
    }

    /**
     * Sets current month as value.
     *
     * @return static
     */
    public function current(): static
    {
        $this->value(
            date('Y-m')
        );

        return $this;
    }


    /**
     * Sets minimum and maximum month.
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
     * Restricts months from current month onwards.
     *
     * @return static
     */
    public function future(): static
    {
        $this->min(
            date('Y-m')
        );

        return $this;
    }


    /**
     * Restricts months up to current month.
     *
     * @return static
     */
    public function past(): static
    {
        $this->max(
            date('Y-m')
        );

        return $this;
    }


    /**
     * Sets current year range.
     *
     * @return static
     */
    public function currentYear(): static
    {
        $year = date('Y');

        return $this
            ->min($year . '-01')
            ->max($year . '-12');
    }
}