<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;

use RedSky\Html\Metadata\Example;

/**
 * The WeekInput component generates a native HTML
 * <input type="week"> element that allows users to
 * select a specific week and year.
 *
 * The value submitted by the browser follows the ISO
 * week date format:
 *
 *     YYYY-Www
 *
 * For example:
 *
 *     2026-W34
 *
 * The component automatically configures the HTML input
 * type as "week". A name can optionally be supplied to
 * identify the value when the containing form is submitted.
 *
 * WeekInput provides convenient methods for common week-based
 * restrictions and values, including:
 *
 * - Setting the current ISO week as the input value.
 * - Restricting the input to the current week or future weeks.
 * - Restricting the input to the current week or previous weeks.
 * - Defining a minimum and maximum selectable week.
 * - Defining the selectable range for the current year.
 *
 * Because WeekInput extends the standard input component,
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
 * echo new WeekInput('week')
 *     ->class('dark')
 *     ->style('color:cornflowerblue')
 *     ->attribute('id', 'week-input')
 *     ->between('2026-W01', '2026-W52')
 *     ->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="week"
 *        name="week"
 *        class="dark"
 *        style="color:cornflowerblue"
 *        id="week-input"
 *        min="2026-W01"
 *        max="2026-W52" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */
#[Example(
    title: 'Complete week input',
    code: <<<'PHP'
    echo new WeekInput('week')
        ->class('dark')
        ->style('color:cornflowerblue')
        ->attribute('id', 'week-input')
        ->between('2026-W01', '2026-W52')
        ->render();
    PHP,
    description: 'The WeekInput component generates a native HTML
                 <input type="week"> element that allows users to
                 select a specific week and year.',
    language: 'php',
    primary: true,
    output: '<input type="week" name="week" class="dark" style="color:cornflowerblue" id="week-input" min="2026-W01" max="2026-W52" />'
)]
class WeekInput extends Input
{
    /**
     * Creates a new week input component.
     *
     * The input type is automatically set to "week".
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
     * Sets the current ISO week as the input value.
     *
     * The generated value follows the ISO week date format:
     *
     *     YYYY-Www
     *
     * For example:
     *
     *     2026-W34
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
     * Sets the minimum and maximum selectable week.
     *
     * The supplied values must use the ISO week date format:
     *
     *     YYYY-Www
     *
     * @param string $min Minimum selectable week.
     * @param string $max Maximum selectable week.
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
     * Restricts selection to the current week and future weeks.
     *
     * The current ISO week becomes the minimum selectable week.
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
     * Restricts selection to the current week and previous weeks.
     *
     * The current ISO week becomes the maximum selectable week.
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
     * Restricts selection to the current year's week range.
     *
     * The range starts at ISO week 01 and ends at ISO week 52.
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