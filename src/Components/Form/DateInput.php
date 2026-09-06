<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

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
 * DateInput provides convenient methods for setting
 * and restricting dates, including:
 *
 * - Setting the current date as the input value.
 * - Restricting dates to today or future dates.
 * - Restricting dates to today or previous dates.
 * - Defining a minimum and maximum selectable date.
 * - Allowing only past dates.
 * - Allowing only future dates.
 *
 * Because DateInput extends the standard input component,
 * it also supports the common component methods for setting
 * HTML attributes, CSS classes, inline styles, and other
 * component properties.
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
 * echo new DateInput('date')
 *     ->class('date-picker')
 *     ->style('color:cornflowerblue')
 *     ->attribute('id', 'date-input')
 *     ->between('2026-01-01', '2026-12-31')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="date"
 *        name="date"
 *        class="date-picker"
 *        style="color:cornflowerblue"
 *        id="date-input"
 *        min="2026-01-01"
 *        max="2026-12-31" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete date input',
    code: <<<'PHP'
    echo new DateInput('date')
        ->class('date-picker')
        ->style('color:cornflowerblue')
        ->attribute('id', 'date-input')
        ->between('2026-01-01', '2026-12-31')
        ->render();
    PHP,
    description: 'The DateInput component generates a native HTML
                 <input type="date"> element and provides
                 convenient methods for setting the current date
                 and restricting the selectable date range.',
    language: 'php',
    primary: true,
    output: '<input type="date" name="date" class="date-picker" style="color:cornflowerblue" id="date-input" min="2026-01-01" max="2026-12-31" />'
)]
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