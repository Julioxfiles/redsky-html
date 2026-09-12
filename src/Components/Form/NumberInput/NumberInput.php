<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form\NumberInput;

use RedSky\Html\Metadata\Example;
use RedSky\Html\Components\Form\Input\Input;

/**
 * Represents an HTML number input component.
 *
 * The NumberInput component generates a native HTML
 * <input type="number"> element for entering numeric values.
 *
 * NumberInput provides convenient methods for configuring
 * common numeric input constraints, including:
 *
 * - Integer values.
 * - Decimal values with a configurable step.
 * - Positive numbers.
 * - Negative numbers.
 * - Minimum and maximum values.
 * - Percentage values from 0 to 100.
 *
 * Because NumberInput extends the standard input component,
 * it also supports the common component methods for setting
 * HTML attributes, CSS classes, inline styles, values,
 * and other input properties.
 *
 * Component methods support fluent method chaining, allowing
 * multiple configuration methods to be combined before the
 * component is rendered.
 *
 * Calling render() returns the generated HTML as a string.
 * The component can also be converted directly to a string
 * through HtmlComponent::__toString().
 *
 * Example:
 *
 * ```php
 * echo new NumberInput('age')
 *     ->integer()
 *     ->positive()
 *     ->between(0, 120)
 *     ->attribute('id', 'age-input')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="number"
 *        name="age"
 *        min="0"
 *        max="120"
 *        step="1"
 *        id="age-input" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete number input',
    code: <<<'PHP'
    echo new NumberInput('age')
        ->integer()
        ->positive()
        ->between(0, 120)
        ->attribute('id', 'age-input')
        ->render();
    PHP,
    description: 'The NumberInput component generates a native HTML
                 <input type="number"> element for entering numeric
                 values with configurable numeric constraints.',
    language: 'php',
    primary: true,
    output: '<input type="number" name="age" min="0" max="120" step="1" id="age-input" />'
)]
class NumberInput extends Input
{
    /**
     * Creates a new number input component.
     *
     * The input type is automatically set to "number".
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
     * Configures the input for integer values.
     *
     * Sets the HTML step attribute to 1, restricting
     * the input to whole-number increments.
     *
     * @return static
     */
    public function integer(): static
    {
        $this->step(1);

        return $this;
    }


    /**
     * Configures the input for decimal values.
     *
     * The step value determines the increment between
     * allowed numeric values.
     *
     * For example, a step of 0.01 allows values such as:
     *
     *     10.01
     *     10.02
     *     10.03
     *
     * @param float $step Decimal increment.
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
     * Restricts the input to positive numbers.
     *
     * Sets the minimum value to 0. This allows zero
     * and positive values.
     *
     * @return static
     */
    public function positive(): static
    {
        $this->min(0);

        return $this;
    }


    /**
     * Restricts the input to negative numbers.
     *
     * Sets the maximum value to 0. This allows zero
     * and negative values.
     *
     * @return static
     */
    public function negative(): static
    {
        $this->max(0);

        return $this;
    }


    /**
     * Sets the minimum and maximum allowed values.
     *
     * The values are assigned to the HTML min and max
     * attributes.
     *
     * @param mixed $min Minimum allowed value.
     * @param mixed $max Maximum allowed value.
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
     * Configures the input for percentage values.
     *
     * Sets the allowed range from 0 to 100 and uses
     * whole-number increments.
     *
     * This is equivalent to:
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
}