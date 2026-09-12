<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\RangeInput;


use RedSky\Html\Components\Form\Input\Input;

/**
 * The RangeInput component generates a native HTML
 * <input type="range"> element for selecting a numeric value.
 *
 * RangeInput provides methods for configuring minimum and
 * maximum values, percentages, volume, ratings, progress,
 * and integer or decimal steps.
 *
 * The range limits and step size are represented by the
 * native HTML min, max, and step attributes.
 *
 * The component is UI-library agnostic and does not apply
 * default CSS classes or styles.
 *
 * @package RedSky\Html\Components\Form
 */
class RangeInput extends Input
{
    /**
     * Creates a new range input component.
     *
     * The input type is automatically set to "range".
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
     * Sets the minimum and maximum range values.
     *
     * The supplied values are assigned to the native HTML
     * min and max attributes.
     *
     * @param mixed $min Minimum selectable value.
     * @param mixed $max Maximum selectable value.
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
     * Configures the range as a percentage control.
     *
     * Sets the range from 0 to 100 using integer steps.
     *
     * Equivalent to:
     *
     *     ->min(0)
     *     ->max(100)
     *     ->step(1)
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
     * Configures the range as a volume control.
     *
     * Sets the range from 0 to 100 using integer steps.
     *
     * This configuration is suitable for representing
     * a volume level where 0 represents silence and
     * 100 represents the maximum level.
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
     * Configures the range as a rating control.
     *
     * The minimum rating is set to 1 and the maximum
     * rating can be configured through the $max parameter.
     *
     * Integer steps are used so that each selectable
     * value represents a whole-number rating.
     *
     * @param int $max Maximum rating value.
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
     * Configures the range as a progress value.
     *
     * Sets the range from 0 to 100 using integer steps.
     *
     * This configuration is suitable for representing
     * a percentage-based progress value.
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
     * Configures the range to use integer steps.
     *
     * A step value of 1 allows the range to move through
     * whole-number increments.
     *
     * @return static
     */
    public function integer(): static
    {
        return $this->step(1);
    }


    /**
     * Configures the range to use decimal steps.
     *
     * The step value determines the increment between
     * selectable values.
     *
     * For example, a step of 0.01 allows values such as
     * 10.01, 10.02, and 10.03.
     *
     * @param float $step Decimal increment.
     *
     * @return static
     */
    public function decimal(
        float $step = 0.01
    ): static {
        return $this->step($step);
    }
}