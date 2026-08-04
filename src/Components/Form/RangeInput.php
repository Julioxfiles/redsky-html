<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

/**
 * Represents an HTML range input component.
 *
 * The range input component generates
 * an input element with type="range".
 *
 * @package RedSky\Html\Components\Form
 */
class RangeInput extends Input
{
    /**
     * Creates a new range input component.
     *
     * @param string|null $name Input name.
     */
    public function __construct(
        ?string $name = null
    ) {
        parent::__construct(
            'range',
            $name
        );
    }

        /**
     * Sets range limits.
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
     * Configures range as percentage.
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


    /**
     * Configures range as volume control.
     *
     * @return static
     */
    public function volume(): static
    {
        return $this
            ->min(0)
            ->max(100)
            ->step(1);
    }


    /**
     * Configures range as rating control.
     *
     * @param int $max
     *
     * @return static
     */
    public function rating(
        int $max = 5
    ): static {
        return $this
            ->min(1)
            ->max($max)
            ->step(1);
    }


    /**
     * Configures range as progress value.
     *
     * @return static
     */
    public function progress(): static
    {
        return $this
            ->min(0)
            ->max(100)
            ->step(1);
    }


    /**
     * Sets integer steps.
     *
     * @return static
     */
    public function integer(): static
    {
        return $this->step(1);
    }


    /**
     * Sets decimal steps.
     *
     * @param float $step
     *
     * @return static
     */
    public function decimal(
        float $step = 0.01
    ): static {
        return $this->step($step);
    }
}