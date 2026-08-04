<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML week input component.
 *
 * The week input component generates
 * an input element with type="week".
 *
 * @package RedSky\Html\Components\Form
 */
class WeekInput extends Input
{
    /**
     * Creates a new week input component.
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
     * Sets current week as value.
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
     * Sets minimum and maximum week.
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
     * Restricts weeks from current week onwards.
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
     * Restricts weeks up to current week.
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
     * Sets current year week range.
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