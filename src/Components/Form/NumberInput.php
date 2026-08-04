<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML number input component.
 *
 * The number input component generates
 * an input element with type="number".
 *
 * @package RedSky\Html\Components\Form
 */
class NumberInput extends Input
{
    /**
     * Creates a new number input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'number',
            $name
        );
    }

        /**
     * Configures input for integer values.
     *
     * @return static
     */
    public function integer(): static
    {
        $this->step(1);

        return $this;
    }


    /**
     * Configures input for decimal values.
     *
     * @param float $step
     *
     * @return static
     */
    public function decimal(
        float $step = 0.01
    ): static {
        $this->step($step);

        return $this;
    }


    /**
     * Restricts values to positive numbers.
     *
     * @return static
     */
    public function positive(): static
    {
        $this->min(0);

        return $this;
    }


    /**
     * Restricts values to negative numbers.
     *
     * @return static
     */
    public function negative(): static
    {
        $this->max(0);

        return $this;
    }


    /**
     * Sets minimum and maximum values.
     *
     * @param mixed $min
     * @param mixed $max
     *
     * @return static
     */
    public function between(
        mixed $min,
        mixed $max
    ): static {
        return $this
            ->min($min)
            ->max($max);
    }


    /**
     * Configures input for percentage values.
     *
     * @return static
     */
    public function percentage(): static
    {
        return $this
            ->min(0)
            ->max(100)
            ->step(1);
    }
}