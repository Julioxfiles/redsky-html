<?php

declare(strict_types=1);

namespace RedSky\Html\Components\Form;
            
use RedSky\Html\Metadata\Example;

/**
 * Represents an HTML week input component.
 *
 * The week input component generates a native HTML
 * input element with type="week".
 *
 * It allows users to select a specific week of a year.
 * The selected value follows the ISO week date format:
 *
 *     YYYY-Www
 *
 * For example:
 *
 *     2026-W34
 *
 * The component provides convenient methods for setting
 * the current week, restricting the selectable range,
 * and limiting the input to past or future weeks.
 *
 * Example:
 *
 * ```php
 * $input = new WeekInput('week');
 *
 * echo $input->render();
 * ```
 *
 * Produces:
 *
 * ```html
 * <input type="week" name="week" />
 * ```
 *
 * @package RedSky\Html\Components\Form
 */

#[Example(
    title: 'Basic week input',
    code: '$input = new WeekInput(\'week\');',
    description: 'Creates a native HTML week input that allows the user to select a week of the year.',
    language: 'php',
    primary: true,
    output: '<input type="week" name="week" />'
)]
#[Example(
    title: 'Current week',
    code: '$input = (new WeekInput(\'week\'))->current();',
    description: 'Sets the current ISO week as the input value.',
    language: 'php',
    output: '<input type="week" name="week" value="2026-W34" />'
)]
#[Example(
    title: 'Future weeks',
    code: '$input = (new WeekInput(\'week\'))->future();',
    description: 'Restricts the input so that users can select the current week or a future week.',
    language: 'php',
    output: '<input type="week" name="week" min="2026-W34" />'
)]
#[Example(
    title: 'Past weeks',
    code: '$input = (new WeekInput(\'week\'))->past();',
    description: 'Restricts the input so that users can select the current week or an earlier week.',
    language: 'php',
    output: '<input type="week" name="week" max="2026-W34" />'
)]
#[Example(
    title: 'Week range',
    code: '$input = (new WeekInput(\'week\'))->between(\'2026-W01\', \'2026-W52\');',
    description: 'Restricts the selectable weeks to a specific range.',
    language: 'php',
    output: '<input type="week" name="week" min="2026-W01" max="2026-W52" />'
)]
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
     * Restricts weeks from current week onwards.
     *
     * The current week becomes the minimum
     * selectable week.
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
     * The current week becomes the maximum
     * selectable week.
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
     * Sets the current year's week range.
     *
     * The range starts at ISO week 01 and ends
     * at ISO week 52.
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